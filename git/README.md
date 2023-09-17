# [Git](https://git-scm.com) and Version Control

I recently had a Git and version control course, and here is a short summary of my key takeaways. I'm sharing this for my future reference and for anyone interested:

What I've Learned:

    01) Commands for managing changes in the project, including staging changes, committing them, and viewing differences as well as resetting changes.
    02) Viewing the project's history/commit logs and inspecting individual commits.
    03) Creating branches, switching between them, and deleting branches.
    04) Combining changes from different branches, either by merging or by rewriting commit history using rebasing.
    05) Managing remote repositories.
    06) Keeping local repositories up-to-date with remote repositories.
    07) Tracking a specific commit in the project's history efficiently.

### Getting Started:
    - git --version: Shows the installed Git version.
    - git init: Initializes a new Git repository in the current directory.
      NOTE: The default branch will be named as 'master' after initializing the Git repository.
            You can change this behaviour using 'git config --global init.defaultBranch <name>' command.
            Names commonly chosen instead of 'master' are 'main' or 'development'.

### Managing Changes:
    - git status: Shows the current status/changes of the Git repository
    - git add <filenaame>: Stages a specific file for the next commit.
    - git add . : Stages all changes in the current directory for the next commit.
    - git commit -m 'commit msg': Creates a new commit with a descriptive message.
    - git commit -am "commit msg": 'git add' and 'git commit -m' at one step.
    - git commit --amend -m "commit msg": Changes the commit msg of last commit, new changes that are staged will be committed too.
    - git diff: Compares workspace with index
    - git diff --staged: Compares index with repository
    - git diff HEAD: Compares workspace with repository / last commit

### Viewing History:
    - git log: Shows the commit history.
    - git log --oneline: Shows a simplified commit history.
    - git log --grep 'SEARCH': Finds commits with a specific message.
    - git log -S 'SEARCH': Finds commits that introduced or removed specific code.
    - git log --numstat: Shows commit statistics, number of lines removed and lines added with each commit.
    - git log -n 2: Shows the last 2 commits (change 2 to any number you want).
    - git show: Displays detailed information about the last commit.
    - git show <commit-has>: Displays detailed information about a single commit.

### Resetting and Discarding Changes:
    - git restore <filename> or git checkout <filename>: Discards changes in a file that are not staged / added in the index.
    - git restore --staged <filename> or git reset <filename> HEAD: Unstages changes in a file that are added to the index but are not committed yet.
    - git reset HEAD~1: Unstages/resets the workspace to the last commit, preserving the changes.
    - git reset <commit-hash>: Resets to a specific commit while preserving the changes.
    - git reset --hard HEAD~1: Resets the workspace to the last commit and discards the changes.
    - git reset --hard <commit-hash>: Resets to a specific commit, discarding all changes.

### Branch Management:
    - git branch <branchname>: Creates a new branch.
    - git switch <branch-name> or git checkout <branch-name>': Switch to an existing branch.
    - git switch -c <branch-name> or git checkout -b <branch name>: Creates and switch to a new branch in one step
    - git switch - or git checkout - : Switch to the previously checked out branch.
    - git branch: Lists local branches.
    - git branch -d <branch-name>: Removes a branch (safe delete).
    - git branch -D <branch-name>: Removes a branch (force delete).
    - git branch -m <new-name>: Renames the current branch.

### Merging and Rebasing:
    - git merge <branch-name>: Integrates changes from one branch into the current branch.
    - git rebase <branch-name>: Reapplies commits on top of another branch's history. For example, 'git rebase master' reapplies commits from the current branch on top of the master branch.
    - git rebase --continue: Continues a rebase in progress.
      NOTE: 'git rebase' Rewrites commit history.

### Remote Repositories (GitHub):
    - git remote add origin <url>: Adds a remote repository named origing
      NOTE: Please replace the <url> with your url of a [GitHub](https://github.com) repository.
            The name <origin> is optional, but mostly used among developers. You can change it to any any other name you like
    
    - git push origin <branch-name>: Pushes all commits of a specific local branch to a remote branch. For example, 'git push origin master' pushes commits to the master branch of a remote repository.
    
    - git push origin --all: pushes all local branches to the remote repository.
      
> sometimes it fails to push changes to the remote branch. The main reason could be that the local branch might be behind the remote branch. So one must first integrate the remote changes using 'git pull' first. Other way would be to force push the changes using 'git push <branch-name> --force' or 'git push --all --force'

    - git remote: Displays list of remote repositories.
    - git remote Removes origin: Remove a remote repository, here the 'origing'.


### Pulling Changes:
    - git pull origin <branch-name>: Fetches and merge changes from a specific branch of a remote repository.

> what does 'git pull' do? it gets the changes from the remote branch and adds them to the local branch, in other words it merges the remote branch with the local branch. In some cases, for example, when both the local branch and the remote branch have received new commits, Git does not know how to reconcile the differences between the two branches and we need to specify it ourselves. We can do so by running one of the following commands:
        1) git config pull.rebase false  # merge
        2) git config pull.rebase true   # rebase
        3) git config pull.ff only       # fast-forward only

### Binary Search (Bisect):
    - git tag <label-name> <commit-hash>: Creates/adds a label for a specific commit.
    - git bisect start: Initiates a binary search to find/track a specific commit.
    - git bisect bad: Marks the current commit as bad.
    - git bisect good <label-name>: Marks a commit with a specific label as good
    - git bisect good: Marks the current commit as good.
      NOTE: repeat 'git bisect good' and 'git bisect bad' until you find the targetted commit.
    - git bisect reset: Ends the binary search.
