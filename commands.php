<?php
//example call:
// gitMain("RepoDir", "ClassDir", "Branch"); Returns array ( [0]=> Y/N, [1]=Y/N )

function gitMain($path, $repo, $branch)
{
  chdir($path);
  getcwd();
  $repoExists = gitRepoExists($path, $repo, $branch);
  $branchExists = gitBranchExists($path, $repo, $branch, $repoExists);
  //return array($repoExists, $branchExists);
  // if you just want it to return 1, go ahead and uncomment the next few lines
  if ($repoExists===1 && $branchExists===1){
    return 1;
  }
  else {
    return 0;
  }
}

//Does Repo Exist?
function gitRepoExists($path, $repo, $branch)
{
  // lists all directories in path
  print_r(glob($repo, GLOB_ONLYDIR));
  chdir($path);
  chdir($repo);
  getcwd();
  if (glob(".git", GLOB_ONLYDIR)[0] === ".git") {
    $repoExists = 1;
    return $repoExists;
  }
  $repoExists = 0;
  return $repoExists;
}

//Does Branch Exist?
function gitBranchExists($path, $repo, $branch, $repoExists)
{
  chdir($path);
  chdir($repo);
  getcwd();
  if ($repoExists == 0)
  {
    $branchExists = 0;
    return $branchExists;
  }
  exec("git branch", $branch_dump, $return_var);
  foreach ($branch_dump as $tempBranch) {
      if (preg_match("/({$branch})/", $tempBranch)) {
          $branchExists = 1;
          return $branchExists;
      }
  }
  $branchExists = 0;
  return $branchExists;
}

function gitGenerateBatch($path, $repo, $branch, $program)
{
  $repoTest = gitRepoTest($path, $repo, $branch);
}
