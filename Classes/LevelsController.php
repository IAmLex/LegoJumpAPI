<?php
    include_once 'Classes/InitPDO.php';

    class LevelsController {
        private $database;

        public function __construct() {
            $pdo = new InitPDO();
            $this->database = $pdo->getDatabase();
        }

        public function GetLevelByName($levelName) {
            // TODO: Error handling.
            $stmt = $this->database->prepare("SELECT * FROM levels WHERE level_name = ':level_name'");
            $stmt->execute([':level_name' => $levelName]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function StoreLevel($filepath, $levelName) {
            $query = "INSERT INTO `levels`(`filepath`, `level_name`) VALUES (:path, :level_name)";
            $stmt = $this->database->prepare($query);

            return $stmt->execute([':path' => $filepath, ':level_name' => $levelName]);
        }
    }