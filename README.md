INI Class ver 0.1.2

This is a replacement for the INI file functions in PHP.

I wasn't all that impressed with how the parse_ini_file() function worked in PHP when it 
came to a URL that had a special character in it, the equal sign.  I also wasn't so pleased
to know that there was no way to save the changed INI fields.  So I wrote this to do what
I needed.  It was originally going to be for a single project, but I thought it would make
nice for other projects and folks as well.

To initalize the class, start it as normal while passing the location of the INI.  If it
doesn't exist yet, it will.  If it does exist, it will return a multi-dimensional array
with all the values within it.  From there, you can change the values in the array, and
then pass it back to save the file again.

The array will be set up as follows:

[section1] = 
				[name1] = value1
				[name2] = value2
[section2] =
				[name3] = value3
				[name4] = value4
				
If you need a new INI file, just create an array with the setup above and pass it to the
save ini function.

[![tip for next commit](http://tip4commit.com/projects/148.svg)](http://tip4commit.com/projects/148)
