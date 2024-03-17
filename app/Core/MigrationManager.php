<?php
class MigrationManager
{
    protected $migrationDIR = '../App/migrations';

    public function __construct()
    {
        $migration = new Migration();
        $checkTable = $migration->checkifTableExists('migration');
        if ($checkTable == false) {
            $createMigrationTable = '../App/migrations/migration.sql';
            $this->executeMigration($createMigrationTable);
        }
    }

    public function getMigration()
    {
        $migration = new Migration();
        $executed_migrations = $migration->find_all_data_from_db();
        $migration_files = glob($this->migrationDIR  . '/*.sql');
        $executed_filenames = array_map(function ($migration) {
            return basename($migration->Name);
        }, $executed_migrations);
        $unexecuted_files = array_filter($migration_files, function ($file) use ($executed_filenames) {
            return !in_array(basename($file), $executed_filenames);
        });
        foreach ($unexecuted_files as $file) {
           $this->executeMigration($file);
        }
    }

    public function executeMigration($file) {
        $migration = new Migration();
        $migrationName = basename($file);
        $sqlContents = file_get_contents($file);
        $migration->query($sqlContents);
        $data['Name'] = $migrationName;
        $migration->insert_data_to_db($data);
    }
}
