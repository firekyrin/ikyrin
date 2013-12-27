#!/bin/bash

SRCDIR=ikyrin
STYLE_FILE=$SRCDIR/style.css
CHANGELOG=$SRCDIR/changelog.txt

WHICH_VER="$1"


#######create version
VERSION=`find bak/ -type f -name "$SRCDIR-*.tar.gz" | sort -r | head -1`
VERSION=`basename $VERSION`
VERSION=`echo $VERSION | sed -e "s/$SRCDIR-//g" | sed -e 's/.tar.gz//g'`
VER_P1=`echo $VERSION | cut -f1 -d'.'`
VER_S2=`echo $VERSION | cut -f2 -d'.'`
VER_T3=`echo $VERSION | cut -f3 -d'.'`
if [ "$WHICH_VER" == "-1" ];then
	VER_P1=`expr $VER_P1 + 1`
	VER_S2=0
	VER_T3=0
elif [ "$WHICH_VER" == "-2" ];then
	VER_S2=`expr $VER_S2 + 1`
	VER_T3=0
else
	VER_T3=`expr $VER_T3 + 1`
fi
NEW_VERSION="$VER_P1.$VER_S2.$VER_T3"
echo "[OK] Create new version:$NEW_VERSION"

######change version in style.css
sed -i "s/^Version: .*$/Version: $NEW_VERSION/g" $STYLE_FILE
echo "[OK] Change style.css:$NEW_VERSION"

######change changelog
[ ! -f $CHANGELOG ] && touch $CHANGELOG
[ -f $CHANGELOG.tmp ] && rm $CHANGELOG.tmp
mv $CHANGELOG $CHANGELOG.tmp
echo "$SRCDIR ($NEW_VERSION) unstable; urgency=low" >> $CHANGELOG
echo "" >> $CHANGELOG
echo "  * update version to $NEW_VERSION" >> $CHANGELOG
echo "" >> $CHANGELOG
echo " -- FireKyrin <819277740@qq.com> `date --rfc-2822`" >> $CHANGELOG
echo "" >> $CHANGELOG
cat $CHANGELOG.tmp >> $CHANGELOG
rm $CHANGELOG.tmp

echo "[OK] Change changelog.txt"

######backup source package
cp -r $SRCDIR $SRCDIR-$NEW_VERSION
tar czvf $SRCDIR-$NEW_VERSION.tar.gz $SRCDIR-$NEW_VERSION
mv $SRCDIR-$NEW_VERSION.tar.gz bak/
rm -rf $SRCDIR-$NEW_VERSION
echo "[OK] Backup source package:$SRCDIR-$NEW_VERSION.tar.gz"

######create zip package
zip -r $SRCDIR.zip $SRCDIR
[ -f tmp/$SRCDIR.zip ] && rm tmp/$SRCDIR.zip
mv $SRCDIR.zip tmp/
echo "[OK] Create zip package:$SRCDIR.zip"

