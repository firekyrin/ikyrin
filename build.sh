#!/bin/bash
# Name:build.sh
# Author:firekyrin
# Email:819277740@qq.com
# Date:2013.8.8

####################################################
#usage
function helpme()
{
	echo "Usage:"
	echo "update primary version(first version):"
	echo "./build -p"
	echo "update secodery version(secodery version):"
	echo "./build -p"
	echo "[default] update third version(small version):"
	echo "./build"
}

#get argument
while [ $# -gt 0 ];do
    case $1 in
        -p)
        shift
	WHICH_VER="-p"
        break
        ;;
	-s)
	WHICH_VER="-s"
        break
        ;;
        *)
	helpme
        break
        ;;
        esac
    shift
done

#echo $WHICH_VER
#exit 0

####################################################
#initial environment
SRCDIR=ikyrin
STYLE_FILE=$SRCDIR/style.css
CHANGELOG=$SRCDIR/changelog.txt
DESTDIR=$HOME/tmp/ikyrin-pack

[ ! -d "$DESTDIR" ] && mkdir -p "$DESTDIR"

####################################################
#change version in style.css
OLD_VERSION=`sed -n '/^Version: .*/{s#Version: \(.*\)#\1#p}' $STYLE_FILE`
VER_P1=`echo $OLD_VERSION | cut -f1 -d'.'`
VER_S2=`echo $OLD_VERSION | cut -f2 -d'.'`
VER_T3=`echo $OLD_VERSION | cut -f3 -d'.'`

if [ "$WHICH_VER" == "-p" ];then
	VER_P1=`expr $VER_P1 + 1`
	VER_S2=0
	VER_T3=0
elif [ "$WHICH_VER" == "-s" ];then
	VER_S2=`expr $VER_S2 + 1`
	VER_T3=0
else
	VER_T3=`expr $VER_T3 + 1`
fi
NEW_VERSION="$VER_P1.$VER_S2.$VER_T3"

sed -i "s/^Version: .*$/Version: $NEW_VERSION/g" $STYLE_FILE
echo "[OK] Change style.css:$NEW_VERSION"

DESTDIR=$DESTDIR/$NEW_VERSION
mkdir -p $DESTDIR

#######create version
VERSION=`find bak/ -type f -name "$SRCDIR-*.tar.gz" | sort -r | head -1`
VERSION=`basename $VERSION`
VERSION=`echo $VERSION | sed -e "s/$SRCDIR-//g" | sed -e 's/.tar.gz//g'`
echo "[OK] Create new version:$NEW_VERSION"

####################################################
#change changelog
[ ! -f $CHANGELOG ] && touch $CHANGELOG
[ -f $CHANGELOG.tmp ] && rm $CHANGELOG.tmp
mv $CHANGELOG $CHANGELOG.tmp
echo "$SRCDIR ($NEW_VERSION) unstable; urgency=low" >> $CHANGELOG
echo "" >> $CHANGELOG
echo "================================================="
echo " Please input changelog content, every line as   "
echo " a changelog record, and input 'q' for exit:     "
echo "================================================="
MY_PROMPT='* '
while :
do
        echo -n "$MY_PROMPT"
        read line
        [ "$line" == "" ] && continue
        [ "$line" == "q" ] && break
	echo "  * $line" >> $CHANGELOG
done
echo "  * update version to $NEW_VERSION" >> $CHANGELOG
echo "" >> $CHANGELOG
echo " -- FireKyrin <819277740@qq.com> `date --rfc-2822`" >> $CHANGELOG
echo "" >> $CHANGELOG
cat $CHANGELOG.tmp >> $CHANGELOG
rm $CHANGELOG.tmp

echo "[OK] Change changelog.txt"

####################################################
#create zip package
zip -r $SRCDIR.zip $SRCDIR >/dev/null 2>&1
mv $SRCDIR.zip $DESTDIR
echo "[OK] Create zip package $DESTDIR/$SRCDIR.zip"

