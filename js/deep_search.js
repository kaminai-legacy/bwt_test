// поиск всех елементов с определенным тегом в дочерних
const deep_search = (needed_tag, current_tag, result_accumulator=[]) =>
{

    function check_children (node)
    {
        if(node.children.length>0)
        {
            return deep_search(needed_tag, node, result_accumulator);
        }
    }

    for(let node of current_tag.children){

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