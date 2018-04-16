<?php
echo('staging-webhook');

// ------------------
$LOCAL_ROOT         = "/var/www/html/public-staging/wp-content/themes";
$LOCAL_REPO_NAME    = "wp-admtheme";
$LOCAL_REPO         = "{$LOCAL_ROOT}/{$LOCAL_REPO_NAME}";
$REMOTE_REPO        = "git@github.com:atelierdesmedias/wp-admtheme.git";
$BRANCH             = "staging";


// ------------------
if ( $_POST['payload'] ) {
  if( file_exists($LOCAL_REPO) ) {
    shell_exec("cd {$LOCAL_REPO} && git pull origin {$BRANCH}");
    die("done " . mktime());
  } else {
    shell_exec("cd {$LOCAL_ROOT} && git clone {$REMOTE_REPO}");
    die("done " . mktime());
  }
}

?>


