# Bower instruction

## Basic
You should have bower installed in you computer , and update it

### Command
Don't use ``bower init`` because we already have a bower.json file, directly update :
```bash
bower update --save
```


## Resources
### Create .bowerrc file
Put it into the root folder and add this:

```bash
{
  "directory" : "public/bower_components"
}
```


 Make sure you have an updated bower.json file ( via git )
