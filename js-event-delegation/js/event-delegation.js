function getTarget(e){                    //Declare function
    if(!e){                               //If there is no event object
        e = window.event;                 //use old IE event object
    }
    return e.target || e.srcElement;      //Get the target of event
}
function itemDone(e){                      //Declare function
    //remove item from the list
    var target, elParent, elGrandparent;   //Declare variables
    target = getTarget(e);                 //Get the item clicked link

    if(target.nodeName.toLowerCase() == "a"){ //If user clicked on an a element
        elListItem = target.parentNode;       //get its li element
        elList = elListItem.parentNode;       //get the ul element
        elList.removeChild(elListItem);       //remove list item from list
    }
    if(target.nodeName.toLowerCase() == "em"){     //if the user clicked on an em element
        elListItem = target.parentNode.parentNode; //get its li element
        elList = elListItem.parentNode;            //get the ul element
        elList.removeChild(elListItem);            //remove list item from list
    }

    //parent link from taking you elsewhere
    if(e.preventDefault){    //if preventDefault() works
        e.preventDefault();  //use preventDefault()
    }else{
        e.returnValue = false; //use old IE version
    }
}

//set up event listeners to call itemDone() on click
var el = document.getElementById('shoppingList'); //get shopping list
if(el.addEventListener){                                   //if event listeners work
    el.addEventListener('click', function(e){ //add listeners on click
        itemDone(e);                                        //it call itemDone()
    }, false);                                       //use bubbling phase for flow
}else{
    el.attachEvent('onclick', function (e) {               //use old IE model: onclick
        itemDone(e);                                       //Call itemDone()
    });
}