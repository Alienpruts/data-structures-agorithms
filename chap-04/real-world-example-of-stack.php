<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 16:47
 */

/**
 * When solving mathematical expressions, the first thing we need to consider is the correctness of nested parentheses.
 * When these do not match calculations could be wrong or not at all possible.
 * Consider these examples :
 *
 *          8 * ( 9 - 2 ) + { (4 * 5) / ( 2 * 2) }
 *          5 * 8 * 9 / ( 3 * 2 ) )
 *          [{ ( 2 * 7 ) + ( 15 - 3) ]
 *
 * Of all these examples, only the first one is correct.
 *
 * We can use the stack to solve this :
 *
 * 1) We check for ( { [ and push them into a stack
 * 2) We check for ) } ] and pop the stack
 * 3) We check if the popped item matches the item currently under investigation
 * 4) If no match - expression is not valid
 * 5) If after all operations the stack is not empty -> invalid
 */

$expressions = [];
$expressions[] = "8 * ( 9 - 2 ) + { (4 * 5) / ( 2 * 2) }";
$expressions[] = "5 * 8 * 9 / ( 3 * 2 ) )";
$expressions[] = "[{ ( 2 * 7 ) + ( 15 - 3) ]";

foreach ($expressions as $expression) {

    echo $expression . PHP_EOL;
    $valid = expressionChecker($expression);

    if ($valid) {
        echo "Expression is valid! " . PHP_EOL;
    } else {
        echo "Expression is not valid!" . PHP_EOL;
    }
}

function expressionChecker( string $expression) : bool
{
    $valid = true;
    $stack = new SplStack();

    for ($i = 0; $i < strlen($expression); $i++) {
        $char = substr($expression, $i, 1);
        switch ($char){
            case '(':
            case '{':
            case '[':
                $stack->push($char);
                break;
            case ')':
            case '}':
            case ']':
                if ($stack->isEmpty()) {
                    $valid = false;
                } else {
                    $last = $stack->pop();
                    if (($char == ")" && $last != "(")
                        || ($char == "}" && $last != "{")
                        || ($char == "]" && $last != "["))
                    {
                        $valid = false;
                    }
                }
                break;
        }

        if (!$valid){
            break;
        }
    }

    if (!$stack->isEmpty()) {
        $valid = false;
    }

    return $valid;

}