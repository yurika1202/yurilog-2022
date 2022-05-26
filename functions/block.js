(function (blocks, element, blockEditor) {
    const el = element.createElement;
    const RichText = blockEditor.RichText;

    blocks.registerBlockType (
        'my-blocks/block',
        {
            title: 'hello',
            icon: 'smiley',
            category: 'layout',
            example: {},
            attributes: {
                myRichText: {
                  type: 'string',
                  default: ''
                }
            },
            edit: function (props) {
                function onChangeContent (newText) {
                    props.setAttributes( {myRichText: newText} );
                }
                return el (
                    RichText,
                    {
                        onChange: onChangeContent,
                        value: props.attributes.myRichText
                    }
                );
            },
            save: function(props) {
                return el (
                    RichText.Content,
                    {
                        value: props.attributes.myRichText,
                    }
                );
            },
        }
    );
} (
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
));