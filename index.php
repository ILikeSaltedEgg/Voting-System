<?php
include 'php/db.php';

$candidates = ["Candidate A", "Candidate B", "Candidate C"];
$votes = [];

$sql = "SELECT candidate, COUNT(*) as count FROM votes GROUP BY candidate";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $votes[$row['candidate']] = $row['count'];
}

foreach ($candidates as $candidate) {
    if (!isset($votes[$candidate])) {
        $votes[$candidate] = 0;
}
}

$has_voted = isset($_COOKIE['has_voted']) ? $_COOKIE['has_voted'] : 'no';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Voting System</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Simple Voting System</h1>
        <?php if ($has_voted === 'yes'): ?>
            <div class="message">You have already voted. Thank you!</div>
        <?php else: ?>
            <form action="php/vote.php" method="POST">
                <h3>Cast Your Vote:</h3>
                <?php foreach ($candidates as $candidate): ?>
                    <label>
                        <input type="radio" name="candidate" value="<?= $candidate ?>" required> <?= $candidate ?>
                    </label>
                <?php endforeach; ?>
                <button type="submit">Submit Vote</button>
            </form>
        <?php endif; ?>

        <div class="vote-results">
            <h2>Vote Results</h2>
            <ul>
                <?php foreach ($votes as $candidate => $count): ?>
                    <li><?= $candidate ?>: <?= $count ?> votes</li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>
