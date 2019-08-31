<?php

class StringManipulation
{
    /**
     * Returns the length of the last word of sentence, or 0 for empty string.
     * Using functions strings manipulation.
     * @param $sentence
     * @return int
     */
    public static function last_word($sentence)
    {
        $sentence = trim($sentence);
        $sentenceLength = strlen($sentence);
        
        if ($sentenceLength > 0) {
            $lastSpacePosition = strrpos($sentence, ' ');
            
            if (!$lastSpacePosition) {
                $result = $sentenceLength;
            } else {
                $result = strlen(substr($sentence, $lastSpacePosition + 1));
            }
        } else {
            $result = 0;
        }
        
        return $result;
    }
    
    /**
     * Returns the length of the last word of sentence, or 0 for empty string.
     * Using functions array manipulation.
     * @param $sentence
     * @return int
     */
    public static function last_word_1($sentence)
    {
        $sentence = trim($sentence);
        $sentenceLength = strlen($sentence);
        
        if ($sentenceLength > 0) {
            $lastWord = array_pop(explode(' ', $sentence));
            
            $result = strlen($lastWord);
            
        } else {
            $result = 0;
        }
        
        return $result;
    }
    
    /**
     * Returns a date formatted in sql date format YYYY-MM-DD.
     * @param $dateStr
     * @return string
     */
    public static function sql_date_format($dateStr)
    {
        $replacements = [' ', '/', '.'];
        
        $dateStr = trim($dateStr);
        $dateStrLength = strlen($dateStr);
        if ($dateStrLength > 0) {
            $dateStr = str_replace($replacements, '-', $dateStr);
            $result = date('Y-m-d', strtotime($dateStr));
        } else {
            $result = '';
        }
        
        return $result;
    }
    
    /**
     * Returns a parts of a string that is marked with square parenthesis, if exists and text "Not marked text" if not exist.
     * @param $str
     * @return string
     */
    public static function extract_string($str)
    {
        $result = '';
        $openQuotePosition = strpos($str, '[');
        $closeQuotePosition = strpos($str, ']');
        
        if ($openQuotePosition && $closeQuotePosition) {
            $pattern = '/\[(.*?)\]/';
            
            preg_match_all($pattern, $str, $matches);
            
            foreach ($matches[1] as $value) {
                $result .= $value . '<br>';
            }
        } else {
            $result = 'No marked text';
        }
        
        return $result;
    }
}

// Sample data Task 1.1
$sentence1 = 'returns the length of the last word';
$sentence2 = 'returns the length of the ';
$sentence3 = 'returns';
$sentence4 = ' ';

// Sample data Task 1.2
$dateStr1 = '31-08-2019';
$dateStr2 = '31/08/2019';
$dateStr3 = '31 08 2019';
$dateStr4 = '31.08.2019';
$dateStr5 = '31 August 2019';

// Sample data Task 1.3
$str1 = 'The quick [brown fox]';
$str2 = 'The [green fox] quick [brown fox]';
$str3 = 'The quick brown fox';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap for a nice view -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>MindConnect Tasks</title>
</head>
<body>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Task 1</h1>
                    <p>Write a class that will support the following methods:</p>
                    <ol>
                        <li>Static function last_word($sentence) – returns the length of the last word of a given
                            sentence, or 0 for empty string.
                        </li>
                        <li>Static function sql_date_format($dateStr) – returns a date formatted in sql date format.
                        </li>
                        <li>Static function extract_string($str) – returns a part of a string that is marked with square
                            parenthesis, if exists. For example: for "The quick [brown fox]." It will return "brown
                            fox". For "Hello World" it will return "".
                        </li>
                    </ol>
                    <h3>Sample Results - Task 1.1</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead class="text-center">
                            <tr>
                                <th>Sentence</th>
                                <th>Last word length</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?= $sentence1; ?></td>
                                <td class="text-center"><?= StringManipulation::last_word($sentence1); ?></td>
                            </tr>
                            <tr>
                                <td><?= $sentence2; ?></td>
                                <td class="text-center"><?= StringManipulation::last_word($sentence2); ?></td>
                            </tr>
                            <tr>
                                <td><?= $sentence3; ?></td>
                                <td class="text-center"><?= StringManipulation::last_word($sentence3); ?></td>
                            </tr>
                            <tr>
                                <td><?= $sentence4; ?></td>
                                <td class="text-center"><?= StringManipulation::last_word($sentence4); ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3>Sample Results - Task 1.2</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead class="text-center">
                            <tr>
                                <th>Date</th>
                                <th>SQL date format</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <tr>
                                <td><?= $dateStr1; ?></td>
                                <td class="text-center"><?= StringManipulation::sql_date_format($dateStr1); ?></td>
                            </tr>
                            <tr>
                                <td><?= $dateStr2; ?></td>
                                <td class="text-center"><?= StringManipulation::sql_date_format($dateStr2); ?></td>
                            </tr>
                            <tr>
                                <td><?= $dateStr3; ?></td>
                                <td class="text-center"><?= StringManipulation::sql_date_format($dateStr3); ?></td>
                            </tr>
                            <tr>
                                <td><?= $dateStr4; ?></td>
                                <td class="text-center"><?= StringManipulation::sql_date_format($dateStr4); ?></td>
                            </tr>
                            <tr>
                                <td><?= $dateStr5; ?></td>
                                <td class="text-center"><?= StringManipulation::sql_date_format($dateStr5); ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3>Sample Results - Task 1.3</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead class="text-center">
                            <tr>
                                <th>String</th>
                                <th>Marked part</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?= $str1; ?></td>
                                <td class="text-center"><?= StringManipulation::extract_string($str1); ?></td>
                            </tr>
                            <tr>
                                <td><?= $str2; ?></td>
                                <td class="text-center"><?= StringManipulation::extract_string($str2); ?></td>
                            </tr>
                            <tr>
                                <td><?= $str3; ?></td>
                                <td class="text-center"><?= StringManipulation::extract_string($str3); ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Task 2</h1>
                    <p>Assume we have those two tables,</p>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead class="text-center">
                            <tr>
                                <th colspan="2">Table 'a'</th>
                                <th colspan="2">Table 'b'</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <tr>
                                <td><strong>Id</strong></td>
                                <td><strong>Name</strong></td>
                                <td><strong>Id</strong></td>
                                <td><strong>Grade</strong></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Eli</td>
                                <td>1</td>
                                <td>98</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Moshe</td>
                                <td>3</td>
                                <td>55</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Yossi</td>
                                <td>4</td>
                                <td>100</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <p>What will be the output of this query? SELECT a.id, a.name, b.grade FROM a LEFT JOIN b on b.id =
                        a.id</p>
                    <ul>
                        <li>3 rows, 1 NULL value</li>
                        <li>2 rows, no NULL values</li>
                        <li>3 rows, 2 NULL values</li>
                        <li>9 rows, no NULL values</li>
                    </ul>
                    <h3>Answer - Task 2</h3>
                    <p><code>Output of this query will be <strong>3 rows, 1 NULL value</strong></code></p>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Task 3</h1>
                    <p>Assume we have those two tables:</p>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead class="text-center">
                            <tr>
                                <th colspan="4">Table salesman</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <tr>
                                <td><strong>id</strong></td>
                                <td><strong>name</strong></td>
                                <td><strong>city</strong></td>
                                <td><strong>commission</strong></td>
                            </tr>
                            <tr>
                                <td>5001</td>
                                <td>James Hoog</td>
                                <td>New York</td>
                                <td>0.15</td>
                            </tr>
                            <tr>
                                <td>5002</td>
                                <td>Nail Knite</td>
                                <td>Paris</td>
                                <td>0.13</td>
                            </tr>
                            <tr>
                                <td>5005</td>
                                <td>Pit Alex</td>
                                <td>London</td>
                                <td>0.11</td>
                            </tr>
                            <tr>
                                <td>5006</td>
                                <td>Mc Lyon</td>
                                <td>Paris</td>
                                <td>0.14</td>
                            </tr>
                            <tr>
                                <td>5003</td>
                                <td>Lauson Hen</td>
                                <td>Berlin</td>
                                <td>0.12</td>
                            </tr>
                            <tr>
                                <td>5007</td>
                                <td>Paul Adam</td>
                                <td>Rome</td>
                                <td>0.13</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead class="text-center">
                            <tr>
                                <th colspan="4">Table customer</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <tr>
                                <td><strong>id</strong></td>
                                <td><strong>name</strong></td>
                                <td><strong>city</strong></td>
                                <td><strong>salesman_id</strong></td>
                            </tr>
                            <tr>
                                <td>3002</td>
                                <td>Nick Rimando</td>
                                <td>New York</td>
                                <td>5001</td>
                            </tr>
                            <tr>
                                <td>3005</td>
                                <td>Graham Zusi</td>
                                <td>California</td>
                                <td>5002</td>
                            </tr>
                            <tr>
                                <td>3001</td>
                                <td>Brad Guzan</td>
                                <td>London</td>
                                <td>5005</td>
                            </tr>
                            <tr>
                                <td>3004</td>
                                <td>Fabian Johns</td>
                                <td>Paris</td>
                                <td>5006</td>
                            </tr>
                            <tr>
                                <td>3007</td>
                                <td>Brad Davis</td>
                                <td>New York</td>
                                <td>5001</td>
                            </tr>
                            <tr>
                                <td>3009</td>
                                <td>Geoff Camero</td>
                                <td>Berlin</td>
                                <td>5003</td>
                            </tr>
                            <tr>
                                <td>3008</td>
                                <td>Julian Green</td>
                                <td>London</td>
                                <td>5002</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <ol>
                        <li>Write an SQL statement to get all customers' name, city and salesmans' names, which the
                            salesman's commission is between 12% and 14%.
                        </li>
                        <li>Write an SQL statement to get all salesmen that didn't sell anything.</li>
                    </ol>
                    <h3>Answer - Task 3.1</h3>
                    <p><code>SELECT customer.name AS customer, customer.city, salesman.name AS salesman FROM customer,
                            salesman WHERE customer.salesman_id = salesman.id AND (salesman.commision*100) BETWEEN 12
                            AND 14</code></p>
                    <h3>Answer - Task 3.2</h3>
                    <p><code>SELECT salesman.name FROM salesman WHERE salesman.id NOT IN (SELECT customer.salesman_id
                            FROM customer)</code></p>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
</body>
</html>