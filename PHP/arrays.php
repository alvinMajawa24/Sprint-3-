<h1>index Array<h1>

<?php
// index Array or Numeric Array
$color =array("Black","Green","White","Red","Black",45,78,78.58);

$item = [12,42,"Book","Rookie","Brenda"];
?>

<pre> 
    <?php print_r($color);?>
</pre>

<pre> 
    <?php var_dump($item);?>
</pre>

<h1> Associative Arrays</h1>
<?php

$user_emails = array(
    "Brenda" => "kekala@yahoo.com",
    "Kambo" => "ian@yahoo.com",
    "Maxi" => "gitonga@yahoo.com"
);
?>

<pre>
    <?php print_r($user_emails);?>
</pre>

<h1> Multidimensional</h1>

<?php

$user_details =[
    "Director" =>[
        "Fullname" => "Rita Kihara",
        "Email" => "ritawanjira@gmail.com",
        "Address" => "west",
        "phone" => [
            "mobile" => "0111555897",
            "cell" => "+256720876751",
            "work" => "+234713977781"
        ],
        ],



"secretary" =>[
    "Fullname" => "Whitney Chepsiror",
    "Email" => "Chepsiror@gmail.com",
    "Address" => "Roysambu",
    "phone" =>[
        "mobile" => "0111555897",
        "cell" => "+256720876751",
        "work" => "+234713977781"
    ],
    ]
];

?>
<?php print $user_details["secretary"]["phone"]["cell"]; ?>
<pre>
    <?php print_r($user_details);?>
</pre>

<?php
    $call["fname"] = "Alex";
    $call["lname"] = "Nyasuguta";
    $call["email"] = "Alex@yahoo.com";

    ?>

<pre>
    <?php print_r($call);?>
</pre>

