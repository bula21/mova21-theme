# BuLa21 Theme with Grunt-Stack

Based on the aid-muster-theme using grunt, scss and npm

1. Clone Repo into a existing wordpress installation into the _wp_content/themes/_ folder
2. open a shell within the project-folder
3. run `npm i` (Install Packages)
4. run `grunt` (Run Grunt-Task with watcher, Details in Gruntfile.js)

## Deployment-Configuration
1. Create an empty textfile named **.ftppass** in the projects root-directory
```
{
  "bula-dev": {
    "username": "YOUR_SSH_USERNAME",  
    "password": "YOUR_SSH_PASSWORD"
  },
  "bula-prod": {
    "username": "YOUR_SSH_USERNAME",  
    "password": "YOUR_SSH_PASSWORD"
  }
}
```
2. run `grunt deploy-dev` for dev deployment or `grunt deploy-prod` for prod deployment
