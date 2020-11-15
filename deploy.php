<?php

namespace Deployer;

require 'recipe/common.php';

desc('Deploy project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:build_docker',
    'deploy:vendors',
    'deploy:writable',
//    'deploy:cache:clear',
//    'deploy:cache:warmup',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
]);

task('deploy:build_docker', function () {
    run('cd {{release_path}} && docker-compose build');
});

task('deploy:vendors', function () {
    run('docker-compose exec php {{bin/composer}} {{composer_options}}');
});



// Project name
set('application', 'scrapers');

// Project repository
set('repository', 'https://github.com/hoekstramenno/scrapers.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts

host('192.168.178.17')
    ->stage('production')
    ->user('pi')
    ->set('deploy_path', '/var/www/html/scrapers')
    ->set('branch', 'master');
//
//task(
//    'build',
//    function () {
//        run('cd {{release_path}} && build');
//    }
//);
