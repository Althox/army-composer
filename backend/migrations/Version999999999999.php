<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * This class adds all data
 */
final class Version999999999999 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addArmy();
        $this->addUnitType();
        $this->addUnit();
    }

    public function down(Schema $schema): void
    {
        $this->addSql('delete from army');
        $this->addSql('delete from unit');
        $this->addSql('delete from unit_type');
    }

    private function addArmy(): void
    {
        $list = [
            'Zoom zooms', 'Kattus', 'Dogs', 'Lupin', 'Serpents'
        ];

        $i = 1;
        foreach ($list as $item) {
            $this->addSql("insert into army(id, name) values(:id, :name)", [$i, $item]);
            $i++;
        }
    }

    private function addUnitType(): void
    {
        $list = [
            'Heavy Tank', 'Flying', 'Biker', 'Submarine'
        ];

        $i = 1;
        foreach ($list as $item) {
            $this->addSql("insert into unit_type(id, name) values(:id, :name)", [$i, $item]);
            $i++;
        }
    }

    private function addUnit(): void
    {
        $list = [
            [
                'name' => 'Cat',
                'unitTypeId' => 3,
                'keyword' => 'Yarn tosser'
            ],
            [
                'name' => 'Bird',
                'unitTypeId' => 2,
                'keyword' => 'zoom, a zoom zoom'
            ],
        ];

        $i = 1;
        foreach ($list as $item) {
            $this->addSql("insert into unit(id, name, unit_type_id, keywords) values(:id, :name, :unit_type_id, :keywords)", [
                $i,
                $item['name'],
                $item['unitTypeId'],
                $item['keyword']
            ]);
            $i++;
        }
    }
}
