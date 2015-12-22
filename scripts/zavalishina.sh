#!/bin/bash

for file in *
do
	if [ -f $file ] 
	then
		echo $file
		head -c 50 -n 1 $file
		echo "----------------------------------------------------------------------------------"
	fi
done
