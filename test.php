<?php
  $testPath = "/tests/AHTesting/"
  chdir($testspath);
  include 'commands-AH.php';
  $myPath =
  // Program repository location
  $path = "/tests/Andrew's Testing/RepoDir-AH";
  $repo = '(035)--ON-3';
  $branch = '16-999-005';
  $repoExists = gitRepoExists($path, $repo, $branch);
  $branchExists = gitBranchExists($path, $repo, $branch);



 ?>
