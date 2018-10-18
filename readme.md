Data Dictionary
======
Creates a diagram of the current datamodel inside Pimcore.

![Sceenshot](https://image.ibb.co/mRmAgL/Screenshot-2018-10-17-at-23-46-00.png)

## Install

Install the bundle with composer, go to the directory of the project and run the following command:

```
COMPOSER_MEMORY_LIMIT=3G composer require youwe/data-dictionary
```

And then enable the bundle:

```
./bin/console pimcore:bundle:install DataDictionaryBundle
```

And youre done!
## Results

You can get the flow by going to the setting (gear icon) -> Show current dataflow. Then a new tab wil be opened with the flow.

Or you can get the data dictionary directly going to the following URL: 
[http://<localhost>/admin/data-dictionary/](http://<localhost>/admin/data-dictionary)

Remember to change the *localhost* to your own pimcore host name.

You should see something like this:

![Example](https://image.ibb.co/dF71pU/image.png)


## Todo
- [ ]  Create a diagram with all the classes, attributes and relations;
    - [x] Classes;
    - [x] Attributes;
    - [x] Relations (basic);  
    - [ ]  Create specific elements for specific cases:
        - [x]  Object Bridge
        - [x]  Bricks
        - [ ]  Block;
        - [ ]  Field collection;
        - [ ]  Tables;
        - [ ]  Classificationstore
- [ ] Generate textual documentation;
    - [ ] Create links between the diagram and the documentation;
    
