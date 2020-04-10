const setExtraPropsToBlockType = (props, blockType, attributes) => {
	const notDefined = (typeof props.className === 'undefined' || !props.className) ? true : false

	if (blockType.name === 'core/paragraph') {
		return Object.assign(props, {
			className: notDefined ? 'govuk-body' : `govuk-body ${props.className}`,
		});
	}

	return props;
};

wp.hooks.addFilter(
	'blocks.getSaveContent.extraProps',
	'wp-block/block-filters',
	setExtraPropsToBlockType
);


const rearrangeBlockCategories = {
	'core/paragraph': 'gov-blocks',
};

wp.hooks.addFilter('blocks.registerBlockType', 'wp-block/change-name', (settings, name) => {
	if (rearrangeBlockCategories[name]) {
		settings.category = rearrangeBlockCategories[name];
	}

	return settings;

});
