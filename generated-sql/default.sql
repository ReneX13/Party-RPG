
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- Ability
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Ability`;

CREATE TABLE `Ability`
(
    `id` INTEGER NOT NULL,
    `class_id` INTEGER NOT NULL,
    `name` INTEGER NOT NULL,
    `element` INTEGER NOT NULL,
    `effect_1` TINYINT,
    `effect_2` TINYINT,
    `effect_3` TINYINT,
    `str` INTEGER NOT NULL,
    `dex` INTEGER NOT NULL,
    `mag` INTEGER NOT NULL,
    `def` INTEGER NOT NULL,
    `eva` INTEGER NOT NULL,
    `res` INTEGER NOT NULL,
    `type` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Account
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Account`;

CREATE TABLE `Account`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(11) NOT NULL,
    `password_hash` VARCHAR(128) NOT NULL,
    `last_active` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `guild_id` INTEGER,
    `inventory_size` INTEGER DEFAULT 0 NOT NULL,
    `gold` INTEGER DEFAULT 0 NOT NULL,
    `experience` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `username` (`username`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Armor
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Armor`;

CREATE TABLE `Armor`
(
    `id` INTEGER NOT NULL,
    `name` VARCHAR(64) NOT NULL,
    `str` INTEGER NOT NULL,
    `dex` INTEGER NOT NULL,
    `mag` INTEGER NOT NULL,
    `def` INTEGER NOT NULL,
    `eva` INTEGER NOT NULL,
    `res` INTEGER NOT NULL,
    `image_file` INTEGER
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Character
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Character`;

CREATE TABLE `Character`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(32) NOT NULL,
    `class_id` INTEGER NOT NULL,
    `level` INTEGER DEFAULT 0 NOT NULL,
    `account_id` INTEGER NOT NULL,
    `main_hand` INTEGER,
    `off_hand` INTEGER,
    `head` INTEGER,
    `body` INTEGER,
    `legs` INTEGER,
    `hands` INTEGER,
    `feet` INTEGER,
    `ability_1` INTEGER NOT NULL,
    `ability_2` INTEGER NOT NULL,
    `ability_3` INTEGER NOT NULL,
    `ability_4` INTEGER NOT NULL,
    `ability_5` INTEGER NOT NULL,
    `current_node` INTEGER NOT NULL,
    `current_exp` INTEGER DEFAULT 0 NOT NULL,
    `party_id` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ChatRoom
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ChatRoom`;

CREATE TABLE `ChatRoom`
(
    `id` INTEGER NOT NULL,
    `type` VARCHAR(64) NOT NULL,
    `messages` VARCHAR(128) NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Class
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Class`;

CREATE TABLE `Class`
(
    `id` INTEGER NOT NULL,
    `name` VARCHAR(64) NOT NULL,
    `str` INTEGER NOT NULL,
    `dex` INTEGER NOT NULL,
    `mag` INTEGER NOT NULL,
    `def` INTEGER NOT NULL,
    `eva` INTEGER NOT NULL,
    `res` INTEGER NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Consumables
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Consumables`;

CREATE TABLE `Consumables`
(
    `id` INTEGER NOT NULL,
    `name` INTEGER NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Efftect
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Efftect`;

CREATE TABLE `Efftect`
(
    `id` INTEGER NOT NULL,
    `name` VARCHAR(64) NOT NULL,
    `level` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Element
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Element`;

CREATE TABLE `Element`
(
    `id` INTEGER NOT NULL,
    `name` VARCHAR(64) NOT NULL,
    `weakness` INTEGER NOT NULL,
    `strong_against` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Enemy
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Enemy`;

CREATE TABLE `Enemy`
(
    `id` INTEGER NOT NULL,
    `name` VARCHAR(32) NOT NULL,
    `level` INTEGER DEFAULT 0 NOT NULL,
    `ability_1` INTEGER NOT NULL,
    `ability_2` INTEGER NOT NULL,
    `ability_3` INTEGER NOT NULL,
    `str` INTEGER NOT NULL,
    `dex` INTEGER NOT NULL,
    `mag` INTEGER NOT NULL,
    `def` INTEGER NOT NULL,
    `eva` INTEGER NOT NULL,
    `res` INTEGER NOT NULL,
    `region_id` INTEGER NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- EnemyAbility
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `EnemyAbility`;

CREATE TABLE `EnemyAbility`
(
    `id` INTEGER NOT NULL,
    `name` INTEGER NOT NULL,
    `element` INTEGER NOT NULL,
    `effect_1` TINYINT,
    `effect_2` TINYINT,
    `effect_3` TINYINT,
    `str` INTEGER NOT NULL,
    `dex` INTEGER NOT NULL,
    `mag` INTEGER NOT NULL,
    `def` INTEGER NOT NULL,
    `eva` INTEGER NOT NULL,
    `res` INTEGER NOT NULL,
    `type` VARCHAR(64) NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- GameItem
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `GameItem`;

CREATE TABLE `GameItem`
(
    `id` INTEGER NOT NULL,
    `type` VARCHAR(24) NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- GlobalChat
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `GlobalChat`;

CREATE TABLE `GlobalChat`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `account_id` INTEGER NOT NULL,
    `message` TEXT NOT NULL,
    `time_posted` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Guild
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Guild`;

CREATE TABLE `Guild`
(
    `id` INTEGER NOT NULL,
    `name` VARCHAR(64) NOT NULL,
    `number_of_members` INTEGER DEFAULT 1 NOT NULL,
    `chat_room_id` INTEGER NOT NULL,
    `guild_leader_id` INTEGER NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Guild Bank
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Guild Bank`;

CREATE TABLE `Guild Bank`
(
    `guild_id` INTEGER NOT NULL,
    `item_id` INTEGER NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Inventory
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Inventory`;

CREATE TABLE `Inventory`
(
    `account_id` INTEGER NOT NULL,
    `item_id` INTEGER NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Mailbox
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Mailbox`;

CREATE TABLE `Mailbox`
(
    `to` INTEGER NOT NULL,
    `from` INTEGER NOT NULL,
    `message` TEXT NOT NULL,
    `item_id` INTEGER NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Map
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Map`;

CREATE TABLE `Map`
(
    `id` INTEGER NOT NULL,
    `name` VARCHAR(64) NOT NULL,
    `description` TEXT NOT NULL,
    `image_file` VARCHAR(128) NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- MapNode
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `MapNode`;

CREATE TABLE `MapNode`
(
    `id` INTEGER NOT NULL,
    `region_id` INTEGER NOT NULL,
    `map_id` INTEGER NOT NULL,
    `node_number` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- NodeConnection
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `NodeConnection`;

CREATE TABLE `NodeConnection`
(
    `node_from` INTEGER NOT NULL,
    `node_to` INTEGER NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Party
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Party`;

CREATE TABLE `Party`
(
    `id` INTEGER NOT NULL,
    `party_leader` INTEGER NOT NULL,
    `messages` VARCHAR(128) NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Region
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Region`;

CREATE TABLE `Region`
(
    `id` INTEGER NOT NULL,
    `map_id` INTEGER NOT NULL,
    `level` INTEGER NOT NULL,
    `description` TEXT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Weapon
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Weapon`;

CREATE TABLE `Weapon`
(
    `id` INTEGER NOT NULL,
    `name` VARCHAR(64) NOT NULL,
    `str` INTEGER NOT NULL,
    `dex` INTEGER NOT NULL,
    `mag` INTEGER NOT NULL,
    `def` INTEGER NOT NULL,
    `eva` INTEGER NOT NULL,
    `res` INTEGER NOT NULL,
    `image_file` INTEGER,
    `type` VARCHAR(32) NOT NULL,
    `level` TINYINT DEFAULT 1 NOT NULL,
    `two-handed` TINYINT(1) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
