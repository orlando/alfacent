#! /bin/zsh
origin_text_domain="'hashcore'"
origin_function_names="hashcore_"
origin_style_css="Text Domain: hashcore"
# have whitespace
origin_DocBlocks=" Hashcore"
origin_prefixed="hashcore-"
#file of languaje
origin_languaje_file="hashcore.pot"

target_text_domain="'sample'"
target_function_names="sample_"
target_style_css="Text Domain: sample"
# have whitespace
target_DocBlocks=" Sample"
target_prefixed="sample-"
#file of languaje
target_languaje_file="sample.pot"
print
print "This program do a replace of string."
print "String \"$origin_text_domain\" --> \"$target_text_domain\""
print "String \"$origin_function_names\" --> \"$target_function_names\""
print "String \"$origin_style_css\" --> \"$target_style_css\""
print "String \"$origin_DocBlocks\" --> \"$target_DocBlocks\""
print "String \"$origin_prefixed\" --> \"$target_prefixed\""
print "String \"$origin_languaje_file\" --> \"$target_languaje_file\""
print
read -q "REPLY?You can continue Y/n"

if [ $REPLY = 'y' ] || [ $REPLY = 'Y' ]; then ;
sed -i '' "s/$origin_text_domain/$target_text_domain/g; s/$origin_function_names/$target_function_names/g; s/$origin_style_css/$target_style_css/g; s/$origin_DocBlocks/$target_DocBlocks/g; s/$origin_prefixed/$target_prefixed/g" **/*.php(D.);
sed -i '' "s/$origin_text_domain/$target_text_domain/g; s/$origin_function_names/$target_function_names/g; s/$origin_style_css/$target_style_css/g; s/$origin_DocBlocks/$target_DocBlocks/g; s/$origin_prefixed/$target_prefixed/g" **/*.css(D.);
sed -i '' "s/$origin_text_domain/$target_text_domain/g; s/$origin_function_names/$target_function_names/g; s/$origin_style_css/$target_style_css/g; s/$origin_DocBlocks/$target_DocBlocks/g; s/$origin_prefixed/$target_prefixed/g" **/*.scss(D.);
sed -i '' "s/$origin_text_domain/$target_text_domain/g; s/$origin_function_names/$target_function_names/g; s/$origin_style_css/$target_style_css/g; s/$origin_DocBlocks/$target_DocBlocks/g; s/$origin_prefixed/$target_prefixed/g" **/*.txt(D.);
sed -i '' "s/$origin_text_domain/$target_text_domain/g; s/$origin_function_names/$target_function_names/g; s/$origin_style_css/$target_style_css/g; s/$origin_DocBlocks/$target_DocBlocks/g; s/$origin_prefixed/$target_prefixed/g" **/*.pot(D.);
sed -i '' "s/$origin_text_domain/$target_text_domain/g; s/$origin_function_names/$target_function_names/g; s/$origin_style_css/$target_style_css/g; s/$origin_DocBlocks/$target_DocBlocks/g; s/$origin_prefixed/$target_prefixed/g; s/$origin_languaje_file/$target_languaje_file/g" **/*.md(D.);
for file in $(find . -name "$origin_languaje_file")
  do
    mv $file `echo $file | sed s/$origin_languaje_file$/$target_languaje_file/`
done;
fi
print
