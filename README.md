# Categories-Blog-Layout
This is an override for Joomla 4.x

This override allows you to display subcategories of a main category for content in a blog layout.

## Installation
1. Copy the 3 files or download them here
2. Copy this files in your Joomla template under "...\templates\cassiopeia\html\com_content\categories\"

##  Create the following language keys in your Joomla:
```bash
INTRO_CATEGORIES_COLS_LABEL="number of columns"
CATEGORIES_BLOG_TITLE="Categories Title"
COM_CONTENT_CATEGORIES_VIEW_BLOG_TITLE="All categories in one post category in blog layout"
COM_CONTENT_CATEGORIES_VIEW_BLOG_OPTION="Show the subcategories of a post category in the blog layout."
```
##  Use this override
Create a new menu item and select the added override under articles as the menu item type.

Choose your main category, which contains several subcategories.

In the Categories tab there are 4 additional fields
- Leading
- Introduction
- Introduction number of columns
- Categories blog title

>For better presentation, your subcategories should have an image and a small description.
>You can hide the number of posts.
>At the end a read more button is displayed, which links to the subcategory.
