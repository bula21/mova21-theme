# BuLa21 Theme with Grunt-Stack

Based on the aid-muster-theme using grunt, scss and npm

1. Clone Repo
2. _npm i_ (Install Packages)
3. _grunt_ (Run Grunt-Task with watcher, Details in Gruntfile.js)

**Deployment-Configuration**
1. Create **.ftppass**-File in Root-Directory
```
{
  "dev": {
    "username": „HAUPT-LOGIN VON SERVER“,  
    "password": „SSH-PASSWORT VON SERVER“
  },
  "prod": {
    "username": „HAUPT-LOGIN VON SERVER“,  
    "password": „SSH-PASSWORT VON SERVER“
  }
}
```
2. adjust sftp-deploy-Task in Gruntfile.js 
```
dev: {
    auth: {
        host: 'dev.YOUR-DOMAIN',
        port: 22,
        authKey: 'dev'
    },
    src: './',
    dest: 'PATH-ON-SERVER/wp-content/themes/bula21/',
    exclusions: [
        'temp/**',
        'node_modules',
        'css/**',
        'js/**',
        '.*',
        'Gruntfile.js',
        'package.json',
        'package-lock.json'
    ],
    progress: true
}
```
for Prod-System add same Snippet, but on first line change _dev_ to _prod_ and adjust the host-name and dest-path  
3. Remove comment from
```
grunt.registerTask('deploy-prod', ['concurrent:build', 'sftp-deploy:prod']);
```
