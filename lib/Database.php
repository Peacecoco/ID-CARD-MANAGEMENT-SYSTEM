<?php
// ============================================================
// lib/Database.php - thin PDO wrapper for the ID card system
// ============================================================

class Database
{
    private PDO $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
        $this->pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function getCollege(int $collegeId): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM colleges WHERE id = ?');
        $stmt->execute([$collegeId]);
        $college = $stmt->fetch();

        if (!$college) {
            throw new RuntimeException("College with id {$collegeId} not found.");
        }

        return $college;
    }

    public function getAllColleges(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM colleges ORDER BY name');
        return $stmt->fetchAll();
    }

    public function getStudentsByCollege(int $collegeId): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM students WHERE college_id = ? AND status = "active" ORDER BY full_name'
        );
        $stmt->execute([$collegeId]);
        return $stmt->fetchAll();
    }

    public function updateStudentProcessedPhoto(int $studentId, string $processedPath): void
    {
        $stmt = $this->pdo->prepare('UPDATE students SET photo_processed_path = ? WHERE id = ?');
        $stmt->execute([$processedPath, $studentId]);
    }

    public function createBatch(int $collegeId, int $studentCount, string $pdfPath, ?string $generatedBy = null): int
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO id_card_batches (college_id, generated_by, student_count, pdf_path, status)
             VALUES (?, ?, ?, ?, "pending")'
        );
        $stmt->execute([$collegeId, $generatedBy, $studentCount, $pdfPath]);
        return (int) $this->pdo->lastInsertId();
    }

    public function completeBatch(int $batchId): void
    {
        $stmt = $this->pdo->prepare('UPDATE id_card_batches SET status = "completed" WHERE id = ?');
        $stmt->execute([$batchId]);
    }

    public function failBatch(int $batchId): void
    {
        $stmt = $this->pdo->prepare('UPDATE id_card_batches SET status = "failed" WHERE id = ?');
        $stmt->execute([$batchId]);
    }

    public function logBatchItem(int $batchId, int $studentId, string $status, ?string $errorMessage = null): void
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO id_card_batch_items (batch_id, student_id, status, error_message)
             VALUES (?, ?, ?, ?)'
        );
        $stmt->execute([$batchId, $studentId, $status, $errorMessage]);
    }
}
