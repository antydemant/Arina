<?php
Yii::import('system.cli.commands.MigrateCommand');

class Migrate extends MigrateCommand
{
    public function getAllMigrations()
    {
        $migrations = CMap::mergeArray($this->getAppliedMigrations(), $this->getNewMigrations());
        return $migrations;
    }

    public function getAppliedMigrations()
    {
        return $this->getMigrationHistory(1000);
    }

    public function getNewMigrations()
    {
        $alias = $this->migrationPath;
        $this->migrationPath = Yii::getPathOfAlias($this->migrationPath);
        $newMigrations = parent::getNewMigrations();
        $this->migrationPath = $alias;
        $arr = array();
        foreach ($newMigrations as $key => $value) {
            $arr [] = $value;
        }
        return $arr;
    }
} 