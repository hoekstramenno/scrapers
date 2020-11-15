<?php

namespace Deployer;

require 'recipe/symfony4.php';

set('bin/console', function () {
    return parse('bin/console');
});

set('docker/exec', function () {
    return parse('docker-compose exec php');
});

set('bin/php', function () {
    return parse('{{docker/exec}} php');
});

set('bin/composer', function () {
    return parse('{{docker/exec}} composer');
});

desc('Installing vendors');
task('deploy:vendors', function () {
    if (!commandExist('unzip')) {
        writeln('<comment>To speed up composer installation setup "unzip" command with PHP zip extension https://goo.gl/sxzFcD</comment>');
    }
    run('cd {{release_path}} && {{bin/composer}} {{composer_options}}');
});

task('deploy:docker', function () {
    run('cd {{release_path}} && docker-compose up -d --build');
});
after('deploy:shared', 'deploy:docker');

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
