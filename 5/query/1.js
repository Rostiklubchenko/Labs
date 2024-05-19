db.getCollection('sales').aggregate(
  [
    {
      $lookup: {
        from: 'products',
        localField: 'K_PP',
        foreignField: 'K_PP',
        as: 'product_info'
      }
    },
    { $unwind: '$product_info' },
    {
      $match: {
        $and: [
          {
            'product_info.PRODUCT.name': {
              $in: ['Міксер', 'Фен']
            }
          },
          { 'product_info.C_YO': { $lte: 45 } }
        ]
      }
    },
    {
      $addFields: {
        'Ціна реалізації': {
          $cond: {
            if: { $lte: ['$KIL', 15] },
            then: {
              $multiply: [
                '$product_info.C_YO',
                1.03
              ]
            },
            else: '$product_info.C_YO'
          }
        }
      }
    },
    {
      $addFields: {
        Вартість: {
          $round: [
            {
              $multiply: [
                '$Ціна реалізації',
                '$KIL'
              ]
            },
            5
          ]
        }
      }
    },
    {
      $project: {
        _id: 0,
        'Найменування типу товару':
          '$product_info.PRODUCT.name',
        'Найменування фірми-виробника':
          '$product_info.FIRM.name',
        'Ціна реалізації': 1,
        'Дата реалізації': '$D_REAL',
        Вартість: 1
      }
    }
  ],
  { maxTimeMS: 60000, allowDiskUse: true }
);