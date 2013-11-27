<?php

namespace Airtime\MediaItem;

use Airtime\MediaItem\om\BasePlaylist;
use \Criteria;
use \PropelPDO;


/**
 * Skeleton subclass for representing a row from the 'playlist' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.airtime
 */
class Playlist extends BasePlaylist
{
	
	public function applyDefaultValues() {
		parent::applyDefaultValues();
		
		$this->name = _('Untitled Playlist');
		$this->modifiedColumns[] = PlaylistPeer::NAME;
	}
	
	/*
	 * returns a list of media contents.
	 */
	public function getContents($criteria = NULL, PropelPDO $con = NULL) {
		
		if (is_null($criteria)) {
			$criteria = new Criteria();
			$criteria->addAscendingOrderByColumn(MediaContentPeer::POSITION);
		}
		
		return parent::getMediaContentsJoinMediaItem($criteria, $con);
	}
}