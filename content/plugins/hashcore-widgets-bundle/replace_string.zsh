#! /bin/zsh
origin_text_domain="'so-widgets-bundle'"
origin_function_names="siteorigin_"
origin_class_names="SiteOrigin_"
# have whitespace
origin_widget_names="SiteOrigin "
origin_js_names="SiteOrigin"
origin_js2_names="siteorigin"
origin_author_names="Author: SiteOrigin"
origin_uri_names="siteorigin.com"
origin_domain="Text Domain: so-widgets-bundle"
origin_class_css=".siteorigin"
origin_path="siteorigin-"
origin_define="SITEORIGIN_"
origin_prefixed="'siteorigin-"
#file of languaje
origin_languaje_file="siteorigin-widgets.po"
origin_class_file="siteorigin-widget.class.php"
origin_field_file="siteorigin-widget-field-class-loader.class.php"
origin_base_file="so-widgets-bundle.php"

# Target
target_text_domain="'hashcore-widgets-bundle'"
target_function_names="hashcore_"
target_class_names="HashCore_"
# have whitespace
target_widget_names="HashCore "
target_js_names="HashCore"
target_js2_names="hashcore"
target_author_names="Author:"
target_uri_names=""
target_domain="Text Domain: hashcore-widgets"
target_class_css=".hashcore"
target_path="hashcore-"
target_define="HASHCORE"
target_prefixed="'hashcore-"
#file of languaje
target_languaje_file="hashcore-widgets.po"
target_class_file="hashcore-widget.class.php"
target_field_file="hashcore-widget-field-class-loader.class.php"
target_base_file="hashcore-widgets-bundle.php"

#Preserve creator
origin_preserve="SiteOrigin Slider"
target_preserve="Siteorigin Slider"

print
print "This program do a replace of string."
print "String \"$origin_text_domain\" --> \"$target_text_domain\""
print "String \"$origin_domain\" --> \"$target_domain\""
print "String \"$origin_prefixed\" --> \"$target_prefixed\""
print "String \"$origin_function_names\" --> \"$target_function_names\""
print "String \"$origin_class_names\" --> \"$target_class_names\""
print "String \"$origin_widget_names\" --> \"$target_widget_names\""
print "String \"$origin_author_names\" --> \"$target_author_names\""
print "String \"$origin_uri_names\" --> \"$target_uri_names\""
print "String \"$origin_path\" --> \"$target_path\""
print "String \"$origin_define\" --> \"$target_define\""
print
print "String \"$origin_class_css\" --> \"$target_class_css\""
print "String \"$origin_languaje_file\" --> \"$target_languaje_file\""
print "String \"$origin_class_file\" --> \"$target_class_file\""
print "String \"$origin_field_file\" --> \"$target_field_file\""
print
read -q "REPLY?You can continue Y/n"

if [ $REPLY = 'y' ] || [ $REPLY = 'Y' ]; then ;
#PHP
sed -i '' "s/$origin_text_domain/$target_text_domain/g; s/$origin_domain/$target_domain/g" **/*.php(D.);
sed -i '' "s/$origin_prefixed/$target_prefixed/g; s/$origin_function_names/$target_function_names/g" **/*.php(D.);
sed -i '' "s/$origin_class_names/$target_class_names/g; s/$origin_widget_names/$target_widget_names/g" **/*.php(D.);
sed -i '' "s/$origin_author_names/$target_author_names/g; s/$origin_uri_names/$target_uri_names/g" **/*.php(D.);
sed -i '' "s/$origin_path/$target_path/g; s/$origin_define/$target_define/g" **/*.php(D.);

# less nand css
sed -i '' "s/$origin_class_css/$target_class_css/g" **/*.less(D.);
sed -i '' "s/$origin_class_css/$target_class_css/g" **/*.css(D.);

#js
sed -i '' "s/$origin_preserve/$target_preserve/g" **/*.js(D.);
sed -i '' "s/$origin_path/$target_path/g" **/*.js(D.);
sed -i '' "s/$origin_js_names/$target_js_names/g" **/*.js(D.);
sed -i '' "s/$origin_js2_names/$target_js2_names/g" **/*.js(D.);

# languaje
sed -i '' "s/$origin_path/$target_path/g" **/*.po(D.);
sed -i '' "s/$origin_js_names/$target_js_names/g" **/*.po(D.);

# languaje
sed -i '' "s/$origin_path/$target_path/g" **/*.html(D.);

# Change File Name

for file in $(find . -name "$origin_languaje_file")
  do
    mv $file `echo $file | sed s/$origin_languaje_file$/$target_languaje_file/`
done;

for file in $(find . -name "$origin_class_file")
  do
    mv $file `echo $file | sed s/$origin_class_file$/$target_class_file/`
done;

for file in $(find . -name "$origin_field_file")
  do
    mv $file `echo $file | sed s/$origin_field_file$/$target_field_file/`
done;

for file in $(find . -name "$origin_base_file")
  do
    mv $file `echo $file | sed s/$origin_base_file$/$target_base_file/`
done;
fi
print
