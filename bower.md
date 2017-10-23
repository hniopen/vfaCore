# Bower instruction

## Required : npm

1. install [nvm](https://github.com/creationix/nvm) to manage npm and node version
2. `nvm install node`
3. `nvm use node`

## Required : bower
1. install bower `npm install -g bower`

## Update
Go to your project then update bower (Laravel project doesn't require install)
### Create .bowerrc file
Put it into the root folder and add this:
```bash
{
  "directory" : "public/bower_components"
}
```
### Remark
Don't use ``bower init`` because we already have a bower.json file, directly update :
```bash
bower update --save
```

Make sure you have an updated bower.json file ( via git )

## Resources
* [tuto installing node.js](https://www.taniarascia.com/how-to-install-and-use-node-js-and-npm-mac-and-windows/)