# Create new app based on Foundation app

## Basis
Please read [this policy](https://docs.google.com/a/hni.org/document/d/1RRmBpsIYGE8Rsyi0WMgVAfNDIv7qt39xQ7KHXo7PyEg/edit?usp=sharing) to understand
!! Note : You can not fork your own repo, please follow below steps

## Whole fork steps
1. Clone the Foundation app (vfaCore) into new folder (here ca-hc4l)`git clone https://github.com/hnidev/vfaCore.git ca-hc4l`
2. point your folder `cd ca-hc4l/`
3. Change ‘vfaCore.git’ to ‘ca-hc4l.git’ in .git/config `nano .git/config` then edit
4. add upstream url `git remote add upstream https://github.com/hnidev/vfaCore.git`
5. Accept the invitation (collaboration), then `git push --all` (you can check master branch is updated)
6. get all branch from upstream `git fetch upstream`
7. checkout to the branch you want to update from the upstream `git checkout ...`
8. Update your current local branch for upstream branch `git merge upstream/version0.2`
9. You can push updates `git push --all` (you may need to resolve conflict if needed)
10. Clear laravel cache, especially for views `php artisan view:clear`, `php artisan cache:clear`. This will consider new *modifs on blades* etc

## Already having new repo
 In case someone has already forked the vfaCore into new app, you just skip above steps to step **#4** (upstream)

## Simple update
If you just want a simple update from upstream, please start from **#6**

## Setup local env.
* update your .env (especially the DB config)
* if you don't need the Dwsync package, modify you config/app.php (remove related provider & alias), then remove the service declaration in composer.json
* However, if you need the Dwsync package, please clone the repo into /packages/hni/dwsync 