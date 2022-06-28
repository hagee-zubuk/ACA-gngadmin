<!DOCTYPE html>
<html lang="en">
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$username = (isset($username))? $username : '';
$password = (isset($password))? $password : '';
$domain = (isset($domain))? $domain : 'LSSNE';
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GNG :: Authenticate</title>

  <link rel="stylesheet" href="<?= base_url('css/bulma.min.css')?>">
    <!-- script defer src="js/all.js"></script -->
    <link rel="stylesheet" href="<?= base_url('css/styles.css')?>">

    <script src="<?=base_url('js/jquery-3.4.1.min.js')?>"></script>
    <link rel="icon" href="<?= base_url('favicon.ico')?>" />
</head>
<body>
  <div class="container">
    <img src="<?=base_url('images/gng-desktop-logo.png')?>" alt="Good News Garage" title="" />
    <h1 class="title">Login</h1>
    <div class="columns">
      <div class="column is-one-third">
        <p class="subtitle">This is the Good News Garage donation tracking site.</p>
        <p>Are you lost? <a href="https://goodnewsgarage.org/" class="button is-link">Click here</a></p>
      </div>
      <div class="column is-one-third">
        <div class="err"><?=$mesg?></div>
<?= form_open('Welcome/authenticate') ?>
        <fieldset >
          <div class="field">
            <label class="label" for="username">Username</label>
            <input class="input" type="text" id="username" name="username" value="<?=$username?>" maxlength="25" placeholder="your windows username" />
          </div>
          <div class="field">
            <label class="label" for="password">Password</label>
            <input class="input" type="password" id="password" name="password" value="<?=$password?>" maxlength="50" placeholder="your windows password" />
          </div>
          <div class="field">
            <label class="label" for="domain">Domain</label>
            <input class="input has-text-grey-light" type="text" id="domain" name="domain" value="<?=$domain?>" maxlength="20" />
          </div>
          <div class="field">
            <input class="button is-primary" type="submit" id="btnGo" name="btnGo" value="Login" />
          </div>
        </fieldset>
<?= form_close() ?>
      </div>
    </div>
  </div>
</body>
</html>
