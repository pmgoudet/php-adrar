<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>SALVE O CURINTIA</h1>
    <?php
    echo "<p>O campeão dos campeões</p>";

    $curintia = 46;
    $array1 = [1, "dois", 3, "quatro virgula tres"];

    var_dump($array1);
    echo "<br>";
    print_r($array1);


    // TIPO DE VARIÁVEL ----------------------------------------------------------------


    echo "<br>";
    echo gettype($curintia);
    echo "<br>";
    echo gettype($array1);


    //FUNÇÕES ---------------------------------------------------------------------------

    function nome_da_funcao()
    {
        echo "<br>";
        echo "função marota";
    }
    nome_da_funcao();

    function adition($n1, $n2)
    {
        echo "<br>";
        echo $n1 + $n2;
    }
    adition(4, 5);



    //SWITCH ----------------------------------------------------------------------------

    switch ($curintia) {
        case 1:
            echo $curintia . "vale 1";
            break;
        case 10:
            echo $curintia . "vale 10";
            break;
        case 46:
            echo $curintia . "vale 46";
            break;
        default:
            break;
    }


    // LOOP ------------------------------------------------------------------------------

    for ($i = 0; $i < 10; $i++) {
        echo "<br>";
        echo $i;
    }

    $i = 0;

    while ($i < 10) {
        echo "<p>ae jão</p>";
        $i++;
    }

    $array2 = ['valor1', 'valor2', 'valor3'];

    foreach ($array2 as $valeur) {
        echo $valeur . "<br>";
    }

    $tableauAssociatif = [ // ISSO AQUI É TIPO UM OBJETO
        'propriedade1' => 'valor1',
        'propriedade2' => 'outracoisa',
        'idade' => 35
    ];

    foreach ($tableauAssociatif as $cle => $valeur) {
        echo "$cle : $valeur <br>";
    };



    // ARRAY ------------------------------------------------------------------------------

    array_push($array2, 20);
    $array2[] = 20; // ESSE E O DE CIMA FAZEM A MESMA COISA, push
    array_unshift($array2, "Insere item no começo do array");


    // APAGAR
    $array = array("Maçã", "Banana", "Cereja", "Damasco", "Manga");
    print_r($array);
    unset($array[2]); // ou array_splice($array, 2, 1);
    print_r($array);

    $autreTableau = [
        'propriedade1' => 'valor1',
        'propriedade2' => 'outracoisa',
        'idade' => 35,
        'notas' => [2, 6, 7]
    ];

    $autreTableau['novaChave'] = "Novo-conteúdo"; // INSERIR CONTEÚDO EM ARRAY ASSOCIATIVO


    echo "<br>";
    print_r($array2);
    echo "<br>";
    print_r($autreTableau);
    echo "<br>";
    echo $autreTableau['idade'];
    echo "<br>";
    var_dump($autreTableau['notas']);
    echo "<br>";
    print_r($autreTableau['notas']);
    echo "<br>";
    print_r($autreTableau['notas'][1]);
    ?>



    <!-- SYNTAXE ALTERNATIVE 0000000000000000000000000000000000000000000000000000000 -->

    <?php
    $test = true;
    $notes = [
        "Français" => 12,
        "Maths" => 16,
        "Geographie" => 11
    ];
    ?>

    <!-- if -->
    <?php if ($test): ?>
        <p>La condition est validée</p>
    <?php else: ?>
        <div>
            <p>Ce n'est pas valide</p>
        </div>
    <?php endif ?>

    <!-- switch -->
    <?php switch ($test):
        case true: ?>
            <p>La condition est validée</p>
            <?php break; ?>
        <?php
        case false: ?>
            <div>
                <p>Ce n'est pas valide</p>
            </div>
            <?php break; ?>
    <?php endswitch ?>

    <!-- foreach -->
    <?php foreach ($notes as $matiere => $note): ?>
        <p>L'élève a eu <?= $note ?> en <?= $matiere ?></p>
    <?php endforeach; ?>


    <!-- for -->
    <?php for ($i = 0; $i < 4; $i++): ?>
        <div>
            <p>Chapitre <?= $i ?></p>
        </div>
    <?php endfor ?>



    <!-- BUFFERING  0000000000000000000000000000000000000000000000000000000000000000 -->

    <?php ob_start() ?>
    <div>
        <h2>BUFFERING - Aqui a gente pode escrever em HTML normal</h2>
        <p>Fazer um parágrafo e mais o que quiser</p>
        <p>E aí com o ob_get_clean() lá em baixo a gente recupera tudo que vem depois de ob_start() e armazena na
            variável $message.</p>
    </div>
    <?php
    $message = ob_get_clean();
    ?>

    <!-- AFFICHAGE -->
    <?= $message ?>

</body>

</html>