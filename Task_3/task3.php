<?php


include ('classes/Task_3/autoload.php');

$url = isset($_GET['url']) ? $_GET['url'] : basename(__FILE__);

if(!empty($url)) {
    $text = @file_get_contents($url);
    $tokenizer = new Task_3\Task_test\HtmlTokenizer($text);
    $counter = new Task_3\Task_test\TagCounter($tokenizer);
    $tagCounts = $counter->getTagCounts();
}
?>
<html>
<head>
    <title>Task 3</title>
<head>
<body>
    <h1>Task 3</h1>
    <p>HTML COUNT</p>

    <div class="form">
        <form>
            <div class="form-group">
                <label for="url">Url</label>
                <input type="text" class="form-control" id="url" name="url" value="<?= htmlspecialchars($url) ?>" aria-describedby="urlHelp" placeholder="Enter URL">
                <small id="urlHelp" class="form-text text-muted">Enter URL to HTML file.</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <?php if(!empty($url)) : ?>
        <div class="block">
            <div class="header">File</div>
            <div class="content"><?= htmlspecialchars($url); ?></div>
        </div>
        <div class="block">
            <div class="header">Result</div>
            <div class="content">
                <table class="result_table">
                    <tr><th>Tag name</th><th>Count</th></tr>
                    <?php foreach ($tagCounts as $name=>$count) : ?>
                        <tr>
                            <td><?= htmlspecialchars($name); ?></td>
                            <td><?= htmlspecialchars($count); ?></td>
                        </tr>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
    <?php endif;?>
<body>
</html>