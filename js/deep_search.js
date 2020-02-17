const deep_search = (needed_tag, parent_tag, result_accumulator=[]) =>
{

    function check_children (node)
    {
        if(node.children.length>0)
        {
            return deep_search(needed_tag, node, result_accumulator);
        }
    }

    for(let node of parent_tag.children){

        if(node.tagName == needed_tag.toUpperCase())
        {
            result_accumulator.push(node);
            check_children(node);
        }
        else
        {
            check_children(node);
        }

    }

    return result_accumulator;
}  