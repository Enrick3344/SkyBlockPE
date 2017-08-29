<?php

namespace MyPlot;

use pocketmine\block\Block;
use pocketmine\block\BlockFactory;
use pocketmine\item\Item;
use pocketmine\level\ChunkManager;
use pocketmine\level\generator\object\Tree;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\math\Vector3;
use pocketmine\nbt\NBT;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\tile\Tile;
use pocketmine\utils\Random;

class SkyBlockStructure{

	/**
	 *
	 * @param ChunkManager|Level $level
	 * @param Vector3 $vec
	 */
	public static function placeObject(Level $level, Vector3 $vec){
		$vec = $vec->subtract(7, 0, 7); // fix offset
		print $vec . PHP_EOL;
		for ($x = 4; $x < 11; $x++){
			for ($z = 4; $z < 11; $z++){
				$level->setBlockIdAt($vec->x + $x, 68, $vec->z + $z, Block::GRASS);
			}
		}
		for ($x = 5; $x < 10; $x++){
			for ($z = 5; $z < 10; $z++){
				$level->setBlockIdAt($vec->x + $x, 67, $vec->z + $z, Block::DIRT);
			}
		}
		for ($x = 6; $x < 9; $x++){
			for ($z = 6; $z < 9; $z++){
				$level->setBlockIdAt($vec->x + $x, 66, $vec->z + $z, Block::DIRT); // 66
			}
		}
		$level->setBlockIdAt($vec->x + 7, 64, $vec->z + 7, Block::BEDROCK); // 0
		$level->setBlockIdAt($vec->x + 7, 65, $vec->z + 7, Block::SAND); // 1
		$level->setBlockIdAt($vec->x + 7, 66, $vec->z + 7, Block::SAND); // 2
		$level->setBlockIdAt($vec->x + 7, 67, $vec->z + 7, Block::SAND); // 3
		if ($level->getBlockIdAt($vec->x + 7, 69, $vec->z + 7) !== Block::LOG)
			Tree::growTree($level, $vec->x + 7, 69, $vec->z + 7, new Random(0), 0);
		$chestpos = new Position($vec->x + 8, 69, $vec->z + 7, $level);
		$block = BlockFactory::get(Block::CHEST, 5);
		$level->setBlock($chestpos, $block);
		$nbt = new CompoundTag("", [
			new ListTag("Items", []),
			new StringTag("id", Tile::CHEST),
			new IntTag("x", $chestpos->x),
			new IntTag("y", $chestpos->y),
			new IntTag("z", $chestpos->z)
		]);
		$nbt->Items->setTagType(NBT::TAG_Compound);
		/** @var \pocketmine\tile\Chest $chest */
		$chest = Tile::createTile("Chest", $level, $nbt);
		$chest->getInventory()->addItem(new Item(Item::ICE, 0, 2), new Item(Item::BUCKET, 10, 1), new Item(Item::MELON_SLICE, 0, 1), new Item(Item::CACTUS, 0, 1), new Item(Item::RED_MUSHROOM, 0, 1), new Item(Item::BROWN_MUSHROOM, 0, 1), new Item(Item::PUMPKIN_SEEDS, 0, 1), new Item(Item::SUGARCANE, 0, 1), new Item(Item::SIGN, 0, 1));

		$level->setBlockIdAt($vec->x + 4, 68, $vec->z + 4, Block::AIR); // 68
		$level->setBlockIdAt($vec->x + 4, 68, $vec->z + 10, Block::AIR);
		$level->setBlockIdAt($vec->x + 10, 68, $vec->z + 4, Block::AIR);
		$level->setBlockIdAt($vec->x + 10, 68, $vec->z + 10, Block::AIR);
		$level->setBlockIdAt($vec->x + 5, 72, $vec->z + 5, Block::AIR); // 72
		$level->setBlockIdAt($vec->x + 5, 72, $vec->z + 9, Block::AIR);
		$level->setBlockIdAt($vec->x + 9, 72, $vec->z + 5, Block::AIR);
		$level->setBlockIdAt($vec->x + 9, 72, $vec->z + 9, Block::AIR);
		$level->setBlockIdAt($vec->x + 5, 73, $vec->z + 7, Block::LEAVES); // 73
		$level->setBlockIdAt($vec->x + 7, 73, $vec->z + 5, Block::LEAVES);
		$level->setBlockIdAt($vec->x + 9, 73, $vec->z + 7, Block::LEAVES);
		$level->setBlockIdAt($vec->x + 7, 73, $vec->z + 9, Block::LEAVES);
		$level->setBlockIdAt($vec->x + 7, 74, $vec->z + 6, Block::LEAVES); // 74
		$level->setBlockIdAt($vec->x + 6, 74, $vec->z + 7, Block::LEAVES);
		$level->setBlockIdAt($vec->x + 8, 74, $vec->z + 7, Block::LEAVES);
		$level->setBlockIdAt($vec->x + 7, 74, $vec->z + 8, Block::LEAVES);
		$level->setBlockIdAt($vec->x + 7, 75, $vec->z + 7, Block::LEAVES); // 75
		$level->setBlockIdAt($vec->x + 7, 65, $vec->z + 8, Block::DIRT); // 65
		$level->setBlockIdAt($vec->x + 8, 65, $vec->z + 7, Block::DIRT);
		$level->setBlockIdAt($vec->x + 7, 65, $vec->z + 6, Block::DIRT);
		$level->setBlockIdAt($vec->x + 6, 65, $vec->z + 7, Block::DIRT);
		$level->setBlockIdAt($vec->x + 5, 66, $vec->z + 7, Block::DIRT); // 66
		$level->setBlockIdAt($vec->x + 7, 66, $vec->z + 5, Block::DIRT);
		$level->setBlockIdAt($vec->x + 9, 66, $vec->z + 7, Block::DIRT);
		$level->setBlockIdAt($vec->x + 7, 66, $vec->z + 9, Block::DIRT);
		$level->setBlockIdAt($vec->x + 4, 67, $vec->z + 7, Block::DIRT); // 67
		$level->setBlockIdAt($vec->x + 7, 67, $vec->z + 4, Block::DIRT);
		$level->setBlockIdAt($vec->x + 7, 67, $vec->z + 10, Block::DIRT);
		$level->setBlockIdAt($vec->x + 10, 67, $vec->z + 7, Block::DIRT);
	}
}