<?php
// AVL tree

ini_set("xdebug.var_display_max_children", '-1');
ini_set("xdebug.var_display_max_data", '-1');
ini_set("xdebug.var_display_max_depth", '-1');


class Node {
    public $value;
    public $left;
    public $right;
    public $height;

    function __construct($value, Node $left = null, Node $right = null, $height = 1) {
        $this->value = $value;
        $this->left = $left;
        $this->right = $right;
        $this->height = $height;
    }
}
function node($value, Node $left = null, Node $right = null, $height = 1) {
    return new Node($value, $left, $right, $height);
}
function node_height(Node $node = null) {
    return $node ? $node->height : 0;
}
function balance_factor(Node $node) {
    return node_height($node->left) - node_height($node->right);
    
}
function rotate_left(Node $node) {
    $a = $node->left;
    $b = $node->right->left;
    $c = $node->right->right;
    $height = max(node_height($a), node_height($b)) + 1;
    return node(
        $node->right->value,
        node($node->value, $a, $b, $height),
        $c,
        max($height, node_height($c)) + 1
    );
}
function rotate_right(Node $node) {
    $b = $node->left->left;
    $c = $node->left->right;
    $d = $node->right;
    $height = max(node_height($c), node_height($d)) + 1;
    return node(
        $node->left->value,
        $b,
        node($node->value, $c, $d, $height),
        max($height, node_height($b)) + 1
    );
}
function replace_left(Node $node, Node $new_left = null, $height = null) {
    //dar derakht asli jay migirad
    return node(
        $node->value,
        $new_left,
        $node->right,
        $height ?: $node->height
    );
}
function replace_right(Node $node, Node $new_right = null, $height = null) {
    return node(
        $node->value,
        $node->left,
        $new_right,
        $height ?: $node->height
    );
}
function retrace(Node $node) {
    $balance_factor = balance_factor($node);
    $balance_factor_left = $node->left ? balance_factor($node->left) : 0;
    $balance_factor_right = $node->right ? balance_factor($node->right) : 0;
    if ($balance_factor === 2) {
                                                                        //     o        //      o         
        if ($balance_factor_left === -1) {                              //    /         //     /          //    o
            $node = replace_left($node, rotate_left($node->left));      //   o    =>    //    o      =>   //   / \
            return rotate_right($node);                                 //    \         //   /            //  o   o
        }                                                               //     o        //  o             
                                              //       o                      
        if ($balance_factor_left === 1) {     //      /             //        o
            return rotate_right($node);       //     o       =>     //       / \
        }                                     //    /               //      o   o
                                              //   o                          
    }                                        
    if ($balance_factor === -2) {
                                                                       // o          // o            
        if ($balance_factor_right === 1) {                             //  \         //  \           //    o
            $node = replace_right($node, rotate_right($node->right));  //   o   =>   //   o     =>   //   / \
            return rotate_left($node);                                 //  /         //    \         //  o   o
        }                                                              // o          //     o        
                                              // o
        if ($balance_factor_right === -1) {   //  \                //    o
            return rotate_left($node);        //   o        =>     //   / \
        }                                     //    \              //  o   o
                                              //     o
    }                
    return $node;
}



function insert($root, $value) {
    $amount = (int)$value[0];

    // shart payan bazgashti
    if (is_null($root)) {
        // yek class baraye node ezafe shode eijad migardad
        return node($value);
    }
    
    if ($amount < $root->value[0]) {
        $new_left = insert($root->left, $value);
        return retrace(replace_left(
            $root,
            $new_left,
            max(node_height($new_left), node_height($root->right)) + 1
        ));
    }
    $new_right = insert($root->right, $value);
    return retrace(replace_right(
        $root,
        $new_right,
        max(node_height($root->left), node_height($new_right)) + 1
    ));
}




// baraye ezafe kardan akharin insert_avltree
function index($root){
    if($root == null){return;}
    index($root->left);
    $GLOBALS["lastindex"] = (int)$root->value[0] + 1;
    index($root->right);
}

function inorder($root){
    if($root == null){return;}
    inorder($root->left);
    echo $root->value[0] . "-";
    inorder($root->right);
}
function preorder($root){
    if($root == null){return;}
    echo $root->value[0] . "-";
    preorder($root->left);
    preorder($root->right);
}
function postorder($root){
    if($root == null){return;}
    postorder($root->left);
    postorder($root->right);
    echo $root->value[0] . "-";
}
// function getnationalcode($node , $nationalcode, $student_information){
//     if($node == null){return;}
//     getnationalcode($node->left , $nationalcode, $student_information);
//     getnationalcode($node->right , $nationalcode, $student_information);
//     if($nationalcode == $node->value){
//         echo $node->value;
//     }
// }


// root
$node = node(array("0" , "firstname" , "lastname" , "fathername" , "birthofdate" , "birthcertificatenumber" , "nationalcode" , "homenumber" , "phonenumber" , "address" , "studentnumber"),);
require("insert_avltree.php");

function nationalcode($nationalcode , $node){
    $GLOBALS["i"] = 0;
    function search($root){  
        if($root == null){return;}
        search($root->left);
        $GLOBALS["i"]++;
        $GLOBALS["searchnationalcode"][$GLOBALS["i"]] = $root->value;
        search($root->right);
    }
    search($node);
    foreach($GLOBALS["searchnationalcode"] as $info){
        if($nationalcode == $info[6]){
            return true;
        }
    }
    return false;
}


function studentnumber($studentnumber , $node){
    $GLOBALS["i"] = 0;
    function searchstudent($root){  
        if($root == null){return;}
        searchstudent($root->left);
        $GLOBALS["i"]++;
        $GLOBALS["searchstudentnumber"][$GLOBALS["i"]] = $root->value;
        searchstudent($root->right);
    }
    searchstudent($node);
    foreach($GLOBALS["searchstudentnumber"] as $info){
        if($studentnumber == $info[10]){
            return true;
        }
    }
    return false;
}





function checkNationalCode($meli)
{
  $cDigitLast = substr($meli , strlen($meli)-1);
  $fMeli = strval(intval($meli));
  if((str_split($fMeli))[0] == "0" && !(8 <= strlen($fMeli)  && strlen($fMeli) < 10)) return false;
  $nineLeftDigits = substr($meli , 0 , strlen($meli) - 1);
  $positionNumber = 10;
  $result = 0;
  foreach(str_split($nineLeftDigits) as $chr){
        $digit = intval($chr);
        $result += $digit * $positionNumber;
        $positionNumber--;
  }
  $remain = $result % 11;
  $controllerNumber = $remain;
  if(2 < $remain){
    $controllerNumber = 11-$remain;
  }
  return $cDigitLast == $controllerNumber; 
}


var_dump($node);














