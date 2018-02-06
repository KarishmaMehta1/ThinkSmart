<?php

session_start();
if(!isset($_SESSION['type']) && !isset($_SESSION['name']) && !isset($_SESSION['username']))
{
    header("Location: ./signin.php?error=You must be Signed In to send your suggestion.");
    exit;
}
else
{
    
    $post_id = $_POST['post_id'];
    $postcomment = $_POST['postcomment'];
    
    require './include/config.php';
    
    if($_SESSION['type'] == 'user')
    {
        
        $insertSuggestion = $link -> prepare("INSERT INTO suggestions(post_id, user_username, suggestion) VALUES(:post_id, :username, :suggestion);");
        $insertSuggestion -> bindParam(':post_id', $post_id);
        $insertSuggestion -> bindParam(':username', $_SESSION['username']);
        $insertSuggestion -> bindParam(':suggestion', $postcomment);
        $insertSuggestion -> execute();
        if($insertSuggestion -> rowCount() == 1)
        {
            $updateSuggestionNumber = $link -> prepare("UPDATE forum_posts SET suggestions = suggestions + 1 WHERE post_id = $post_id;");
            $updateSuggestionNumber -> execute();
            $updateUserReputation = $link -> prepare("UPDATE user SET reputation = reputation + 1 WHERE user_username = '$_SESSION[username]';");
            $updateUserReputation -> execute();
            header("Location: ./viewQuestionSuggestions.php?post_id=$post_id");
            exit;
        }
        else
        {
            echo 'kalesh';
        }
    }
    
    if($_SESSION['type'] == 'expert')
    {
        
        $insertComment = $link -> prepare("INSERT INTO comments(post_id, user_username, comment) VALUES(:post_id, :username, :comment);");
        $insertComment -> bindParam(':post_id', $post_id);
        $insertComment -> bindParam(':username', $_SESSION['username']);
        $insertComment -> bindParam(':comment', $postcomment);
        $insertComment -> execute();
        if($insertComment -> rowCount() == 1)
        {
            $updateSolutionNumber = $link -> prepare("UPDATE forum_posts SET solutions = solutions + 1 WHERE post_id = $post_id;");
            $updateSolutionNumber -> execute();
            $updateExpertReputation = $link -> prepare("UPDATE experts SET reputation = reputation + 1 WHERE user_username = '$_SESSION[username]';");
            $updateExpertReputation -> execute();
            header("Location: ./viewQuestionComments.php?post_id=$post_id");
            exit;
        }
        else
        {
            echo 'kalesh';
        }
        
    }
    
}