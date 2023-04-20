<?php

declare(strict_types=1);

namespace Classes;

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = DBConnection::getConnection();
    }

    public function InsertUserViews(string $ipAddress, string $userAgent, string $pageUrl, int $viewsCount)
    {
        $sqlQuery = 'INSERT INTO user_views(ip_address, user_agent, page_url, views_count) VALUES (?, ?, ?, ?)';

        try {
            $query = $this->db->pdo->prepare($sqlQuery);

            $query->execute(
                [
                    $ipAddress,
                    $userAgent,
                    $pageUrl,
                    $viewsCount,
                ],
            );
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getUserViews(string $ipAddress, string $userAgent, string $pageUrl) : int
    {
        $sqlQuery = 'SELECT * FROM user_views WHERE ip_address=? AND user_agent=? AND page_url=?';

        try {
            $query = $this->db->pdo->prepare($sqlQuery);

            $query->execute(
                [
                    $ipAddress,
                    $userAgent,
                    $pageUrl,
                ],
            );

            return (int) $query->fetch()['views_count'] ?? 0;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function UpdateUserViews(string $ipAddress, string $userAgent, string $pageUrl, int $viewsCount)
    {
        $sqlQuery = 'UPDATE user_views SET views_count = ? WHERE ip_address = ? AND user_agent = ? AND page_url = ?';

        try {
            $query = $this->db->pdo->prepare($sqlQuery);

            $query->execute(
                [
                    $viewsCount,
                    $ipAddress,
                    $userAgent,
                    $pageUrl,
                ],
            );
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
