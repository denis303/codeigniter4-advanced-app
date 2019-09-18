<?php

use denis303\bootstrap4\FormGroup;

/* @var $this \CodeIgniter\View\View */
/* @var $model \App\Models\LoginForm */

$this->data['title'] = 'Login';

$this->data['breadcrumbs'][] = $this->data['title'];

helper(['form']);
?>

<h1><?= esc($this->data['title']);?></h1>

<p>Please fill out the following fields to login:</p>

<?= form_open('', ['id' => 'login-form']);?>

<?= view('_errors', ['errors' => $errors]);?>

<?= FormGroup::factory([
    'content' => form_input(
        'email', 
        array_key_exists('email', $data) ? $data['email'] : '', 
        [
            'autofocus' => true,
            'class' => 'form-control'
        ]
    ),
    'label' => $model->getFieldLabel('email'),
    'error' => array_key_exists('email', $errors) ? $errors['email'] : null
]);?>

<?= FormGroup::factory([
    'content' => form_password(
        'password', 
        '', 
        [
            'class' => 'form-control'
        ]
    ),
    'label' => $model->getFieldLabel('password'),
    'error' => array_key_exists('password', $errors) ? $errors['password'] : null
]);?>

<?= form_hidden('rememberMe', 0);?>

<?= FormGroup::factory([
    'content' => '<br>'. form_checkbox(
        'rememberMe',
        '1',
        (array_key_exists('username', $data) && $data['username']) ? true : false,
        [
            'id' => 'remember-me-checkbox'
        ]
    ),
    'label' => $model->getFieldLabel('rememberMe'),
    'labelOptions' => [
        'class' => 'mb-0',
        'for' => 'remember-me-checkbox'
    ],
    'error' => array_key_exists('rememberMe', $errors) ? $errors['rememberMe'] : null
]);?>

<div style="color:#999;margin:1em 0">
    
    If you forgot your password you can <a href="<?= site_url('user/requestPasswordReset');?>">reset it</a>.
    
    <br>
    
    Need new verification email? <a href="<?= site_url('user/resendVerificationEmail');?>">Resend</a>

</div>

<div class="form-group">
    
    <?= form_submit('login-button', 'Login', ['class' => 'btn btn-primary']);?>

</div>

<?= form_close();?>