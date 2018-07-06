while getopts l:f:o:p: option
do 
 case "${option}"
 in 
 l) label=${OPTARG};;
 f) file=${OPTARG};;
 o) out=${OPTARG};;
 p) path=${OPTARG};;
 esac
done

echo $label
echo $file
echo $out
echo $path

cp $path/sites/all/modules/popupjb/vcf.template $path/sites/all/modules/popupjb/tmp

sed -i "s/LABEL/$label/g" $path/sites/all/modules/popupjb/tmp
sed -i "s|FILENAME|$file|g" $path/sites/all/modules/popupjb/tmp
sed -i "s/\}\].*/},/g" $out/trackList.json
sed -i "s/\]\}.*/,/g" $out/trackList.json
sed -i "s/\ \ \ \]//g" $out/trackList.json
sed -i '/"formatVersion"\ :\ 1$/{ N; s/.*//; }' $out/trackList.json
sed -i "s/^\],$/,/g" $out/trackList.json
sed -i "s/^\}$/,/g" $out/trackList.json

cat $path/sites/all/modules/popupjb/tmp
cat $path/sites/all/modules/popupjb/tmp >> $out/trackList.json
#rm $path/sites/all/modules/popupjb/tmp
