<?php

namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'square1');

// Project repository
set('repository', 'git@github.com:wagura-maurice/square1.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);
set('default_timeout', 150000);

// Shared files/dirs between deploys
add('shared_files', ['.env']);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);

// Hosts
host('198.211.20.99')
    ->user('deployer')
    ->port(22)
    ->identityFile('~/.ssh/id_rsa') // ssh on local machine that links to the deployer on vps
    ->set('deploy_path', '/var/www/html/{{application}}');

// Tasks
task('build', function () {
    run('cd {{release_path}} && build');
});

// Update the task sequence
task('release:theBaby', function () {
    // serve the app down
    run('{{bin/php}} {{release_path}}/artisan down');
    // Optimize Application
    run('{{bin/php}} {{release_path}}/artisan app:optimize');
    // Run database migrations
    // run('{{bin/php}} {{release_path}}/artisan migrate:fresh --seed --force');
    // serve the app up
    run('{{bin/php}} {{release_path}}/artisan up');
})->once();

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database and other laravel tasks before symlink new release.
before('deploy:symlink', 'release:theBaby');
