<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250524000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create user-related tables';
    }

    public function up(Schema $schema): void
    {
        // Create t_users table
        $this->addSql('CREATE TABLE t_users (
            id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
            public_user_id VARCHAR(255) NOT NULL COMMENT \'公開用ユーザーID\',
            user_name VARCHAR(255) NOT NULL COMMENT \'ユーザー名\',
            created_at DATETIME DEFAULT NULL,
            updated_at DATETIME DEFAULT NULL,
            deleted_at DATETIME DEFAULT NULL,
            created_by VARCHAR(255) DEFAULT NULL COMMENT \'作成者\',
            updated_by VARCHAR(255) DEFAULT NULL COMMENT \'更新者\',
            deleted_by VARCHAR(255) DEFAULT NULL COMMENT \'削除者\',
            PRIMARY KEY(id),
            UNIQUE INDEX t_users_public_user_id_unique (public_user_id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB AUTO_INCREMENT=1');
        
        // Create m_user_roles table
        $this->addSql('CREATE TABLE m_user_roles (
            id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
            role_name VARCHAR(255) NOT NULL COMMENT \'ロール名\',
            created_at DATETIME DEFAULT NULL,
            updated_at DATETIME DEFAULT NULL,
            deleted_at DATETIME DEFAULT NULL,
            created_by VARCHAR(255) DEFAULT NULL COMMENT \'作成者\',
            updated_by VARCHAR(255) DEFAULT NULL COMMENT \'更新者\',
            deleted_by VARCHAR(255) DEFAULT NULL COMMENT \'削除者\',
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB AUTO_INCREMENT=1');
        
        // Create l_user_logs table
        $this->addSql('CREATE TABLE l_user_logs (
            id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
            t_user_id BIGINT UNSIGNED NOT NULL COMMENT \'ユーザーID\',
            log_type VARCHAR(255) NOT NULL COMMENT \'ログタイプ\',
            log_message TEXT NOT NULL COMMENT \'ログメッセージ\',
            created_at DATETIME DEFAULT NULL,
            updated_at DATETIME DEFAULT NULL,
            deleted_at DATETIME DEFAULT NULL,
            created_by VARCHAR(255) DEFAULT NULL COMMENT \'作成者\',
            updated_by VARCHAR(255) DEFAULT NULL COMMENT \'更新者\',
            deleted_by VARCHAR(255) DEFAULT NULL COMMENT \'削除者\',
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB AUTO_INCREMENT=1');
        
        // Create t_user_roles table
        $this->addSql('CREATE TABLE t_user_roles (
            id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
            t_user_id BIGINT UNSIGNED NOT NULL COMMENT \'ユーザーID\',
            m_user_role_id BIGINT UNSIGNED NOT NULL COMMENT \'ロールID\',
            created_at DATETIME DEFAULT NULL,
            updated_at DATETIME DEFAULT NULL,
            deleted_at DATETIME DEFAULT NULL,
            created_by VARCHAR(255) DEFAULT NULL COMMENT \'作成者\',
            updated_by VARCHAR(255) DEFAULT NULL COMMENT \'更新者\',
            deleted_by VARCHAR(255) DEFAULT NULL COMMENT \'削除者\',
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB AUTO_INCREMENT=1');
        
        // Create t_user_settings table
        $this->addSql('CREATE TABLE t_user_settings (
            id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
            t_user_id BIGINT UNSIGNED NOT NULL COMMENT \'ユーザーID\',
            setting_key VARCHAR(255) NOT NULL COMMENT \'設定キー\',
            setting_value TEXT NOT NULL COMMENT \'設定値\',
            created_at DATETIME DEFAULT NULL,
            updated_at DATETIME DEFAULT NULL,
            deleted_at DATETIME DEFAULT NULL,
            created_by VARCHAR(255) DEFAULT NULL COMMENT \'作成者\',
            updated_by VARCHAR(255) DEFAULT NULL COMMENT \'更新者\',
            deleted_by VARCHAR(255) DEFAULT NULL COMMENT \'削除者\',
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB AUTO_INCREMENT=1');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE t_user_settings');
        $this->addSql('DROP TABLE t_user_roles');
        $this->addSql('DROP TABLE l_user_logs');
        $this->addSql('DROP TABLE m_user_roles');
        $this->addSql('DROP TABLE t_users');
    }
}