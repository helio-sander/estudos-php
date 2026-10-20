<ol>

    <?php

    $produtos = [
        "teclado",
        "mouse",
        "notebook",
        "tablet",
        "celular"
    ];

    $produtos[] = "caneta";
    $produtos[] = "Pepino";



    foreach ($produtos as $produto) {
        echo "<li>$produto</li>";
    }

    echo "</ol>";
    echo "<hr>";

    $contagem = count($produtos);
    echo "Contagem: " . $contagem . " produtos";

    $numero = 1;
    foreach ($produtos as $produto) {
        echo "<p>{$numero} - {$produto}</p>";
        $numero++;
    }

    ?>