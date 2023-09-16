# Git and Version Control: What I've Learned?

I recently had a Git and version control course, and here is a short summary of the main things I've learned.
I'm sharing this for my future reference and for anyone interested:

Main topics:

    01) commands for managing changes in the project, including staging changes, committing them, and viewing differences as well as resetting changes.
    02) view project's history / commit logs and inspect individual commits.
    03) creating branches, switching between, and deleting branches.
    04) combining changes from different branches, either by merging or by rewriting commit history using rebasing.
    05) managing remote repositories.
    06) keeping local repositories up-to-date with remote repositories.
    07) tracking a specific commit in the project's history efficiently

### Getting Started:
    - git --version: Check the installed Git version.
    - git init: Initialize a new Git repository in the current directory.

### Managing Changes:
    - git status: Show the current status/changes of the Git repository
    - git add <filenaame>: Stage a specific file for the next commit.
    - git add . : Stage all changes in the current directory for the next commit.
    - git commit -m 'commit msg': Create a new commit with a descriptive message.
    - git commit -am "commit msg": 'git add' and 'git commit -m' at one step.
    - git commit -amend -m "commit msg": Merge the last commit with the new commit, new changes that are added in index will be committed too.
    - git diff: compares workspace with index
    - git diff --staged: compares index with repository
    - git diff HEAD: compare workspace with repository / last commit

### Viewing History:
    - git log: View the commit history.
    - git log --help --web:
    - git log --oneline: Show a simplified commit history.
    - git log --grep 'SEARCH': Find commits with a specific message.
    - git log -S 'SEARCH': Find commits that introduced or removed specific code.
    - git log --numstat: View commit statistics, number of lines removed and lines added with each commit.
    - git log -n 2: Show the last 2 commits (change 2 to any number you want).
    - git show: Display detailed information about the last commit. Displays objects (commits, tags, trees, blobs)
    - git show <commit-has>: Display detailed information about a single commit.

### Resetting and Discarding Changes:
    - git restore <filename> or git checkout <filename>: Discards changes in a file that are not staged / added in the index.
    - git restore --staged <filename> or git reset <filename> HEAD: Unstages changes in a file that are added to the index but are not committed yet.
    - git reset HEAD~1: Unstages/resets the workspace to the last commit, preserving the changes.
    - git reset <commit-hash>: Resets to a specific commit while preserving the changes.
    - git reset --hard HEAD~1: Resets the workspace to the last commit and discards the changes.
    - git reset --hard <commit-hash>: Resets to a specific commit, discarding all changes.

### Branch Management:
    - git branch <branchname>: Create a new branch.
    - git switch <branch-name> or git checkout <branch-name>': Switch to an existing branch.
    - git switch -c <branch-name> or git checkout -b <branch name>: Create and switch to a new branch in one step
    - git switch - or git checkout - : Switch to the previously checked out branch.
    - git branch: List local branches.
    - git branch -d <branch-name>: Delete a branch (safe delete).
    - git branch -D <branch-name>: Delete a branch (force delete).

### Merging and Rebasing:
    - git merge <branch-name>: Integrate changes from one branch into the current branch.
    - git rebase <branch-name>: Reapply commits on top of another branch's history. For example, 'git rebase master' reapplies commits from the current branch on top of the master branch.
    - git rebase --continue: Continue a rebase in progress.
      NOTE: 'git rebase' rewrites commit history

### Remote Repositories (GitHub):
    - git remote add origin URL: Add a remote repository named origing (typically on GitHub). 
      NOTE: Please replace the URL with your url of your GitHub repository.
    - git push origin <branch-name>: Push all commits of a specific local branch to a remote branch. For example, 'git push origin master' pushes commits to the master branch of a remote repository.
    - git push -u origin <branch-name>: Push changes to a remote repository and set up tracking.
    - git push origin --all: pushes all local branches to the remote repository.
    - git remote remove origin: Remove a remote repository, here the 'origing'.
    - git remote: Display list of remote repositories.

### Binary Search (Bisect):
    - git tag <label-name> <commit-hash>: Create/add a label for a specific commit.
    - git bisect start: Initiate a binary search to find/track a specific commit.
    - git bisect bad: Mark the current commit as bad.
    - git bisect good <label-name>: Mark a commit with a specific label as good
    - git bisect good: Mark the current commit as good.
      NOTE: repeat 'git bisect good' and 'git bisect bad' until you find the targeted commit.
    - git bisect reset: End the binary search.
