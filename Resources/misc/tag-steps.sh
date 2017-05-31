#!/bin/bash

declare -a commits=(
	"Create the extension Bundle"
	"Set up the configuration"
	"Add a route to the application"
	"Add a CSS to the View"
	"Add a new navigation item"
	"Fix navigation in the app from the view"
	"Fix pagination links"
	"Add the handling of the content type dropdown"
	)
declare -a tags=(
	"step1_create_the_extension_bundle"
	"step2_set_up_the_configuration"
	"step3_alter_the_javascript_application_routing"
	"step4_define_a_view"
	"step5_configure_the_navigation"
	"step6_build_the_content_list"
	"step7_paginate_results"
	"step8_filter_by_content_type"
	)

numberOfCommits=${#commits[@]}

for (( i=0; i<${numberOfCommits}; i++ ));
do
	SHA1=`git log --oneline --all --grep "${commits[$i]}" | cut -d" " -f1`
	git tag "${tags[$i]}" ${SHA1}
done

git push --tags

echo "Tags created and pushed."
