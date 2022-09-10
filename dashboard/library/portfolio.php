<?php

class classPortfolio {
    function connection_database() {
        return mysqli_connect("localhost", "root", "", "portfolio");
    }

    function addPortfolio($image, $description, $user_id) {
        $insert_portfolio = "INSERT INTO `portfolio` (`image`, `description`, `user_id`) VALUES ('$image', '$description', '$user_id') ";
        mysqli_query($this->connection_database(), $insert_portfolio);
        $res = mysqli_affected_rows($this->connection_database());
        if($res == 1) {
            return true;
        } else {
            return false;
        }
    }

    function getPortfolios() {
        $select_portfolio = "SELECT * FROM `userportfolio` ";
        $query = mysqli_query($this->connection_database(), $select_portfolio);
    
        $portfolios = [];
        while($result = mysqli_fetch_assoc($query)) {
            $portfolios[] = $result;
        }
        return $portfolios;
    }
    
    function deletePortfolio($projectid) {
        $delete_portfolio = "DELETE FROM `portfolio` WHERE `id` = '$projectid'";
        mysqli_query($this->connection_database(), $delete_portfolio);
        $result = mysqli_affected_rows($this->connection_database());
        if($result == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    function getPortfolioById($projectid) {
        $select_portfolio = "SELECT * FROM `userportfolio` WHERE `id` = '$projectid' ";
        $query = mysqli_query($this->connection_database(), $select_portfolio);
        $result = mysqli_fetch_assoc($query);
        return $result;
    }
    
    function updatePortfolio($id, $description, $image) {
        $update_portfolio = "UPDATE `portfolio` SET `description` = '$description' ";
    
        if(!empty($image)) {
            $update_portfolio .= ", `image` = '$image' ";
        }
        
        $update_portfolio .= " WHERE `id` = '$id' ";
    
    
        mysqli_query($this->connection_database(), $update_portfolio);
        $result = mysqli_affected_rows($this->connection_database());
        if($result == 1) {
            return true;
        } else {
            return false;
        }
    }
}






?>
