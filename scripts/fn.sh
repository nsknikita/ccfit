#!/bin/bash
for file in *
do
	if [ -f "$file" ]
	then
		echo $file;
		head -n 1 $file;
		echo ----------------;
	fi
done
